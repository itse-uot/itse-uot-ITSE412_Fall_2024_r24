<?php
require_once 'dbconfig.php';

session_start();
$userID = $_SESSION['user']['UserID']  ; // تأكد من أن UserID موجودة في الجلسة

try {
    $query = "SELECT UserID, Username, Email, Password, CreatedAt, UpdatedAt FROM users WHERE UserID = :userID";
    $stmt = $conn->prepare($query);
    $stmt->execute([':userID' => $userID]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        echo json_encode($user);
    } else {
        echo json_encode(["message" => "لم يتم العثور على بيانات المستخدم."]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "حدث خطأ أثناء تحميل البيانات: " . $e->getMessage()]);
}
?>