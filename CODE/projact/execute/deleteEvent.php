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

    // استعلام لحذف الفعالية
    $query = "DELETE FROM events WHERE EventID = :eventID AND UserID = :userID";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'eventID' => $eventID,
            'userID' => $_SESSION['user']['UserID'] // استخراج UserID من الجلسة
        ]);

        // التحقق من أن الفعالية تم حذفها
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'تم حذف الفعالية بنجاح!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على الفعالية أو لا يوجد لديك صلاحية لحذفها.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>