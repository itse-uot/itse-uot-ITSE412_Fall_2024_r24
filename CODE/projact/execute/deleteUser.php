<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete_account') {
    try {
        // الحصول على معرف المستخدم من الجلسة
        $userId = $_SESSION['user']['UserID'];

        // حذف المستخدم من قاعدة البيانات
        $stmt = $conn->prepare("DELETE FROM users WHERE UserID = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        // إنهاء الجلسة بعد الحذف
        session_destroy();

        // رسالة نجاح
        echo json_encode(['status' => 'success', 'message' => 'تم حذف الحساب بنجاح.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء حذف الحساب: ' . $e->getMessage()]);
    }
}
?>

