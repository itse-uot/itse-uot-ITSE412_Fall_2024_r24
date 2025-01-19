<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'get_data') {
    $volunteerId = $_SESSION['user']['UserID']; // استخدام ID من الجلسة مباشرة

    $query = "SELECT FullName, Skills, ContactNumber, ContactEmail, ProfilePicture FROM Volunteers WHERE VolunteerID = :volunteerId";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':volunteerId', $volunteerId);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على بيانات']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>

