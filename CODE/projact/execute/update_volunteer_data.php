<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'update_data') {
    $UserId = $_SESSION['user']['UserID']; // استخدام ID من الجلسة مباشرة
    $fullName = $_POST['fullName2'];
    $skills = $_POST['about'];
    $contactNumber = $_POST['phone'];
    $Email = $_POST['email'];

    $profilePicture = null;
    if (!empty($_FILES['profileImage']['tmp_name']) && $_FILES['profileImage']['error'] == 0) {
        if ($_FILES['profileImage']['type'] !== 'image/png') {
            echo json_encode(['status' => 'error', 'message' => 'يجب أن تكون الصورة من نوع PNG']);
            exit;
        }
        $profilePicture = file_get_contents($_FILES['profileImage']['tmp_name']);
    }

    $query = "UPDATE users SET 
                FullName = :fullName, 
                Skills = :skills, 
                ContactNumber = :contactNumber, 
                Email = :Email" .
                ($profilePicture ? ", ProfilePicture = :profilePicture" : "") . 
              " WHERE UserID = :UserId";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':skills', $skills);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->bindParam(':Email', $Email);
        if ($profilePicture) {
            $stmt->bindParam(':profilePicture', $profilePicture, PDO::PARAM_LOB);
        }
        $stmt->bindParam(':UserId', $UserId);
        $stmt->execute();

        echo json_encode(['status' => 'success', 'message' => 'تم تحديث البيانات بنجاح']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>
