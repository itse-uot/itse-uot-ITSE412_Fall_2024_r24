<?php
session_start();
include 'dbconfig.php'; // الاتصال بقاعدة البيانات

// التحقق من وجود البيانات المرسلة
if (isset($_POST['eventID']) && isset($_POST['userID'])) {
    $eventID = $_POST['eventID'];
    $userID = $_POST['userID'];

    // التحقق مما إذا كان المستخدم قد قدم طلبًا بالفعل لهذا الحدث
    $checkQuery = "
        SELECT ApplicationID FROM applications
        WHERE EventID = :eventID AND UserID = :userID
    ";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(':eventID', $eventID);
    $checkStmt->bindParam(':userID', $userID);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // إذا كان المستخدم قد قدم طلبًا بالفعل
        echo json_encode(['success' => false, 'message' => 'لقد قمت بتقديم طلب لهذا الحدث مسبقًا.']);
        exit();
    }

    // إدخال البيانات في جدول applications
    $query = "
        INSERT INTO applications (EventID, UserID, ApplicationStatus)
        VALUES (:eventID, :userID, 'Pending')
    ";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':eventID', $eventID);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        // إرجاع استجابة ناجحة
        echo json_encode(['success' => true, 'message' => 'تم تقديم الطلب بنجاح!']);
    } catch (PDOException $e) {
        // إرجاع استجابة فاشلة في حالة حدوث خطأ
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
}
?>