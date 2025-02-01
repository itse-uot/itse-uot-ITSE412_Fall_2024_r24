<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eventID'])) {
    $eventID = $_POST['eventID'];

    // تحقق من أن المستخدم مسجل الدخول
    if (!isset($_SESSION['user'])) {
        echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول أولاً.']);
        exit;
    }

    // استرجاع UserID من الجلسة
    $userID = $_SESSION['user']['UserID'];

    // استعلام لإضافة طلب المشاركة
    $query = "INSERT INTO applications (EventID, VolunteerID, ApplicationStatus) VALUES (:eventID, :volunteerID, 'Pending')";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'eventID' => $eventID,
            'volunteerID' => $userID
        ]);
        

        echo json_encode(['status' => 'success', 'message' => 'تم تقديم طلب المشاركة بنجاح!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>