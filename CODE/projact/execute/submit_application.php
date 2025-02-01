<?php
session_start();
include 'dbconfig.php'; // الاتصال بقاعدة البيانات

// التحقق من وجود البيانات المرسلة
if (isset($_POST['eventID']) && isset($_POST['userID'])) {
    $eventID = $_POST['eventID'];
    $userID = $_POST['userID'];

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
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // إرجاع استجابة فاشلة في حالة حدوث خطأ
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
}
?>
