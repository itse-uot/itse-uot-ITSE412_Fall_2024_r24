<?php
session_start();
include 'dbconfig.php'; // ملف الاتصال بقاعدة البيانات

if (!isset($_SESSION['userID'])) {
    echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول']);
    exit;
}

$userID = $_SESSION['userID'];

// استعلام لجلب الطلبات المرسلة
$query = "SELECT a.ApplicationID, a.ApplicationStatus, e.EventName, e.Location, o.OrganizationName, o.ContactEmail 
          FROM Applications a
          JOIN Events e ON a.EventID = e.EventID
          JOIN Organizations o ON e.OrganizationID = o.OrganizationID
          WHERE a.VolunteerID = :userID";

try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['userID' => $userID]);
    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($applications)) {
        echo json_encode(['status' => 'success', 'message' => 'لا توجد طلبات مرسلة.', 'data' => []]);
    } else {
        echo json_encode(['status' => 'success', 'data' => $applications]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء جلب البيانات: ' . $e->getMessage()]);
}
?>