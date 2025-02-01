<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notificationID = $_POST['notificationID'];

    try {
        $query = "UPDATE notifications SET IsRead = 1 WHERE NotificationID = :notificationID";
        $stmt = $conn->prepare($query);
        $stmt->execute(['notificationID' => $notificationID]);

        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>