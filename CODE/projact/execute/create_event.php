<?php
session_start(); // بدء الجلسة
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استرجاع البيانات من النموذج
    $eventName = $_POST['eventName'];
    $eventStartDate = $_POST['eventStartDate'];
    $eventEndDate = $_POST['eventEndDate'];
    $eventLocation = $_POST['eventLocation'];
    $eventSkills = $_POST['eventSkills'];
    $eventDescription = $_POST['eventDescription'];
    $eventImage = $_FILES['eventImage'];

    // التحقق من أن الحقول مطلوبة
    if (empty($eventName) || empty($eventStartDate) || empty($eventEndDate) || empty($eventLocation) || empty($eventSkills) || empty($eventDescription) || empty($eventImage)) {
        echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
        exit;
    }

    // تحميل الصورة
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($eventImage["name"]);
    if (!move_uploaded_file($eventImage["tmp_name"], $target_file)) {
        echo json_encode(['status' => 'error', 'message' => 'فشل في تحميل الصورة.']);
        exit;
    }

    // الحصول على OrganizationID من الجلسة
    if (!isset($_SESSION['org'])) {
        echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول كمنظمة أولاً.']);
        exit;
    }
    $organizationID = $_SESSION['org'];

    // استعلام لإضافة الفعالية
    $query = "INSERT INTO events (EventName, StartDate, EndDate, Location, RequiredSkills, Description, Image, OrganizationID) 
              VALUES (:eventName, :startDate, :endDate, :location, :skills, :description, :image, :organizationID)";

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'eventName' => $eventName,
            'startDate' => $eventStartDate,
            'endDate' => $eventEndDate,
            'location' => $eventLocation,
            'skills' => $eventSkills,
            'description' => $eventDescription,
            'image' => $target_file,
            'organizationID' => $organizationID // استخدام OrganizationID من الجلسة
        ]);

        echo json_encode(['status' => 'success', 'message' => 'تم إنشاء الفعالية بنجاح!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>