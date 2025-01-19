<?php
session_start();
include 'dbconfig.php';


// if (!isset($_SESSION['userID'])) {
//     echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول']);
//     exit;
// }

$userID = $_SESSION['user']['UserID'];

$query = "SELECT OrganizationID, OrganizationName, Field, Location, OrganizationPicture 
          FROM Organizations 
          WHERE UserID = :userID";

try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['userID' => $userID]);
    $organizations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($organizations)) {
        echo json_encode(['status' => 'success', 'message' => 'لا توجد منظمات.', 'data' => []]);
    } else {
        echo json_encode(['status' => 'success', 'data' => $organizations]);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء جلب البيانات: ' . $e->getMessage()]);
}
?>