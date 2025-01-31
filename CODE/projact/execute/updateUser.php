<?php
require_once 'dbconfig.php';

session_start();
$userID = $_SESSION['user']['UserID'] ; // تأكد من وجود UserID في الجلسة

$username = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['Password'];

try {
    $query = "UPDATE users SET Username = :username, Email = :email, Password = :password, UpdatedAt = NOW() WHERE UserID = :userID";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':username' => $username,
        ':email'    => $email,
        ':password' => $password,
        ':userID'   => $userID,
    ]);

    echo json_encode(["message" => "تم تحديث البيانات بنجاح."]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "حدث خطأ أثناء تحديث البيانات: " . $e->getMessage()]);
}
?>
