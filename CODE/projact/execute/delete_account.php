<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'delete_account') {
    $userId = 3; // معرف المستخدم

    try {
        $query = "DELETE FROM Accounts WHERE userID = :userId";
        $stmt = $conn->prepare($query);
        $stmt->execute(['userId' => $userId]);

        echo json_encode(['status' => 'success', 'message' => 'تم حذف الحساب بنجاح.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>