<?php
session_start();
include 'dbconfig.php'; // الاتصال بقاعدة البيانات

// تحقق من إذا كان تم إرسال البيانات عبر POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $userId = 3; // استرجاع معرف المستخدم من الجلسة
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // تأكد من أن كلمة المرور ليست فارغة وامكانية تشفيرها
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT); // تشفير كلمة المرور
    }

    try {
        $query = "UPDATE Accounts SET username = :username, email = :email, password = :password WHERE userID = :userId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userId', $userId);

        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'تم تحديث البيانات بنجاح']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
