<?php
session_start();

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['UserID'])) {
    echo json_encode(['status' => 'error', 'message' => 'المستخدم غير مسجل الدخول.']);
    exit;
}

echo json_encode(['status' => 'success', 'userID' => $_SESSION['user']['UserID']]);
?>