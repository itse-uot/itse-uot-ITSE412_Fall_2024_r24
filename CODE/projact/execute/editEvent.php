<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تحقق من أن المستخدم مسجل الدخول
    // if (!isset($_SESSION['user'])) {
    //     echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول أولاً.']);
    //     exit;
    // }

    // استرجاع البيانات من النموذج
    $eventName = $_POST['eventName'];
    $eventStartDate = $_POST['eventStartDate'];
    $eventEndDate = $_POST['eventEndDate'];
    $eventLocation = $_POST['eventLocation'];
    $eventSkills = $_POST['eventSkills'];
    $eventDescription = $_POST['eventDescription'];
    $eventImage = $_FILES['eventImage'];

    // التحقق من أن الحقول مطلوبة
    if (empty($eventName) || empty($eventStartDate) || empty($eventEndDate) || empty($eventLocation) || empty($eventSkills) || empty($eventDescription)) {
        echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
        exit;
    }

    // تحميل الصورة (إذا تم تحميل صورة جديدة)
    $target_file = null;
    if (!empty($eventImage['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($eventImage["name"]);
        move_uploaded_file($eventImage["tmp_name"], $target_file);
    }

    // استعلام لتعديل الفعالية
    $query = "UPDATE events SET 
              EventName = :eventName, 
              StartDate = :startDate, 
              EndDate = :endDate, 
              Location = :location, 
              RequiredSkills = :skills, 
              Description = :description, 
              Image = :image 
              WHERE EventID = :eventID AND UserID = :userID";
    
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
            'eventID' => $_POST['eventID'], // يجب إضافة eventID إلى النموذج
            'userID' => $_SESSION['user']['UserID'] // استخراج UserID من الجلسة
        ]);

        echo json_encode(['status' => 'success', 'message' => 'تم تعديل الفعالية بنجاح!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>