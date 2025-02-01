<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'update_data') {
    // الحصول على OrganizationID من الجلسة
    if (!isset($_SESSION['org'])) {
        echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على بيانات المنظمة في الجلسة.']);
        exit;
    }

    $organizationId = $_SESSION['org'];
    $organizationName = $_POST['organizationName'];
    $description = $_POST['description'];
    $field = $_POST['field'];
    $location = $_POST['location'];
    $contactEmail = $_POST['contactEmail'];
    $phoneNumber = $_POST['phoneNumber'];

    $organizationPicture = null;
    if (!empty($_FILES['profileImage']['tmp_name']) && $_FILES['profileImage']['error'] == 0) {
        if ($_FILES['profileImage']['type'] !== 'image/png') {
            echo json_encode(['status' => 'error', 'message' => 'يجب أن تكون الصورة من نوع PNG']);
            exit;
        }
        $organizationPicture = file_get_contents($_FILES['profileImage']['tmp_name']);
    }

    $query = "UPDATE organizations SET 
                OrganizationName = :organizationName, 
                Description = :description, 
                Field = :field, 
                Location = :location, 
                ContactEmail = :contactEmail, 
                PhoneNumber = :phoneNumber" .
                ($organizationPicture ? ", OrganizationPicture = :organizationPicture" : "") . 
              " WHERE OrganizationID = :organizationId";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':organizationName', $organizationName);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':field', $field);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':contactEmail', $contactEmail);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        if ($organizationPicture) {
            $stmt->bindParam(':organizationPicture', $organizationPicture, PDO::PARAM_LOB);
        }
        $stmt->bindParam(':organizationId', $organizationId);
        $stmt->execute();

        echo json_encode(['status' => 'success', 'message' => 'تم تحديث البيانات بنجاح']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>