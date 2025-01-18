<?php
require_once 'dbconfig.php';

session_start();
$userID = 6; // تأكد من أن UserID موجودة في الجلسة

try {
    $query = "DELETE FROM users WHERE UserID = :userID";
    $stmt = $conn->prepare($query);
    $stmt->execute([':userID' => $userID]);

    echo json_encode(["message" => "تم حذف الحساب بنجاح."]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "حدث خطأ أثناء حذف الحساب: " . $e->getMessage()]);
}
?>