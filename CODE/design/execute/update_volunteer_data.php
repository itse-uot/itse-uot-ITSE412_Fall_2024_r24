<?php
include 'dbconfig.php'; // تأكد من أن ملف الاتصال بقاعدة البيانات صحيح

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update_data') {
    // استرجاع بيانات المتطوع
    $volunteerId = $_POST['volunteerId'];
    $fullName = $_POST['fullName2'];
    $skills = $_POST['about'];
    $contactNumber = $_POST['phone'];
    $contactEmail = $_POST['email'];
    
    // التعامل مع الصورة
    $profilePicture = null;
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == 0) {
        // رفع الصورة
        $fileTmpPath = $_FILES['profileImage']['tmp_name'];
        $fileName = $_FILES['profileImage']['name'];
        $fileSize = $_FILES['profileImage']['size'];
        $fileType = $_FILES['profileImage']['type'];

        // التأكد من أن الصورة هي PNG
        if ($fileType != 'image/png') {
            echo json_encode(['status' => 'error', 'message' => 'يجب أن تكون الصورة من نوع PNG']);
            exit;
        }

        // قراءة محتوى الصورة كـ بيانات ثنائية
        $imageData = file_get_contents($fileTmpPath);
        $profilePicture = $imageData; // تخزين البيانات الثنائية

        // التأكد من أن الصورة تم تحميلها بشكل صحيح
        if (!$imageData) {
            echo json_encode(['status' => 'error', 'message' => 'فشل تحميل الصورة']);
            exit;
        }
    }

    // استعلام لتحديث بيانات المتطوع
    $query = "UPDATE Volunteers SET FullName = :fullName, Skills = :skills, ContactNumber = :contactNumber, ContactEmail = :contactEmail" . ($profilePicture ? ", ProfilePicture = :profilePicture" : "") . " WHERE VolunteerID = :volunteerId";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':skills', $skills);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->bindParam(':contactEmail', $contactEmail);
        if ($profilePicture) {
            // ربط البيانات الثنائية للصورة مع الحقل
            $stmt->bindParam(':profilePicture', $profilePicture, PDO::PARAM_LOB);
        }
        $stmt->bindParam(':volunteerId', $volunteerId);
        
        $stmt->execute();
        echo json_encode(['status' => 'success', 'message' => 'تم تحديث البيانات بنجاح']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>
