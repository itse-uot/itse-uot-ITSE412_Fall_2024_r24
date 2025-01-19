<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['userID'])) {
    echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $organizationID = $_POST['organizationID'];

    $query = "DELETE FROM Organizations WHERE OrganizationID = :organizationID AND UserID = :userID";

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['organizationID' => $organizationID, 'userID' => $_SESSION['userID']]);

        echo json_encode(['status' => 'success', 'message' => 'تم حذف المنظمة بنجاح.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء حذف المنظمة: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>