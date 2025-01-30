<?php
session_start(); // بدء الجلسة
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// التحقق من أن المستخدم مسجل الدخول
if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول أولاً.']);
    exit;
}

$userID = $_SESSION['user']['UserID']; // الحصول على ID المستخدم من الجلسة

// استعلام لجلب الفعاليات التي اشترك فيها المتطوع
$query = "
    SELECT e.EventName, e.Description AS eventDescription, e.StartDate AS eventDate, 
           e.Image AS eventImage
    FROM applications a
    JOIN events e ON a.EventID = e.EventID
    JOIN volunteers v ON a.VolunteerID = v.VolunteerID
    WHERE v.UserID = :userID AND a.ApplicationStatus = 'Accepted'
";

try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['userID' => $userID]);
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($events) {
        echo json_encode(['status' => 'success', 'data' => $events]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على فعاليات.']);
    }
} catch (Exception $e) {
    error_log('حدث خطأ: ' . $e->getMessage()); // تسجيل الخطأ في السجلات
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
}
?>