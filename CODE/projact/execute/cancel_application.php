<?php
session_start();
include 'dbconfig.php'; // ملف الاتصال بقاعدة البيانات

if (!isset($_SESSION['userID'])) {
    echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicationID = $_POST['applicationID'];

    // التحقق من أن الطلب في حالة Pending
    $query = "SELECT ApplicationStatus FROM Applications WHERE ApplicationID = :applicationID AND VolunteerID = :userID";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['applicationID' => $applicationID, 'userID' => $_SESSION['userID']]);
        $application = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($application && $application['ApplicationStatus'] === 'Pending') {
            // حذف الطلب
            $deleteQuery = "DELETE FROM Applications WHERE ApplicationID = :applicationID";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->execute(['applicationID' => $applicationID]);

            echo json_encode(['status' => 'success', 'message' => 'تم إلغاء الطلب بنجاح.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لا يمكن إلغاء هذا الطلب.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء إلغاء الطلب: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>