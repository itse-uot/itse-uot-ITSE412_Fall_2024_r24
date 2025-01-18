<?php
session_start();
include 'dbconfig.php'; // الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userId = 3; // استرجاع معرف المستخدم من الجلسة

    try {
        $query = "SELECT username, email, password FROM Accounts WHERE userID = :userId";
        $stmt = $conn->prepare($query);
        $stmt->execute(['userId' => $userId]);

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            // إرجاع البيانات بتنسيق JSON
            echo json_encode(['status' => 'success', 'data' => $userData]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'المستخدم غير موجود.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>