<?php
// بدء الجلسة
session_start();

// تفعيل عرض الأخطاء
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

// تضمين ملف الاتصال بقاعدة البيانات
include 'dbconfig.php';


$userID = $_SESSION['user']['UserID'];

// التحقق من أن الطريقة المستخدمة هي POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // جمع البيانات من النموذج
    $organizationName = $_POST['organizationName'];
    $description = $_POST['description'];
    $field = $_POST['field'];
    $location = $_POST['location'];
    $contactEmail = $_POST['contactEmail'];
    $phoneNumber = $_POST['phoneNumber'];

    // معالجة تحميل الصورة
    $profilePicture = null;
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
        $profilePicture = file_get_contents($_FILES['profilePicture']['tmp_name']);
    }

    // إدخال البيانات في قاعدة البيانات
    $query = "INSERT INTO Organizations (OrganizationName, Description, Field, Location, ContactEmail, PhoneNumber, OrganizationPicture, UserID) 
              VALUES (:organizationName, :description, :field, :location, :contactEmail, :phoneNumber, :profilePicture, :userID)";

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'organizationName' => $organizationName,
            'description' => $description,
            'field' => $field,
            'location' => $location,
            'contactEmail' => $contactEmail,
            'phoneNumber' => $phoneNumber,
            'profilePicture' => $profilePicture,
            'userID' => $userID
        ]);

        echo json_encode(['status' => 'success', 'message' => 'تم إنشاء المنظمة بنجاح.']);
    } catch (PDOException $e) {
        // تسجيل الخطأ في ملف السجلات
        error_log("خطأ في إنشاء المنظمة: " . $e->getMessage());

        // إرسال رسالة الخطأ كاستجابة JSON
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء إنشاء المنظمة: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}

//$userID = $_SESSION['user']['UserID'];

// if (!isset($_SESSION['userID'])) {
//     echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول']);
//     exit;
// }
?>

