<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['eventID'])) {
    $eventID = $_GET['eventID'];

    // تحقق من أن المستخدم مسجل الدخول
    if (!isset($_SESSION['user'])) {
        echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول أولاً.']);
        exit;
    }

    // استعلام لاسترجاع بيانات الفعالية
    $query = "SELECT * FROM events WHERE EventID = :eventID AND UserID = :userID";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'eventID' => $eventID,
            'userID' => $_SESSION['user']['UserID'] // استخراج UserID من الجلسة
        ]);
        $eventData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($eventData) {
            echo json_encode(['status' => 'success', 'data' => $eventData]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على الفعالية.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>