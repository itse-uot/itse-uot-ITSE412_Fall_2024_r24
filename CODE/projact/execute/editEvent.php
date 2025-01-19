<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // استرجاع البيانات من النموذج
  $eventID = $_POST['eventID'];
  $eventName = $_POST['eventName'];
  $eventStartDate = $_POST['eventStartDate'];
  $eventEndDate = $_POST['eventEndDate'];
  $eventLocation = $_POST['eventLocation'];
  $eventSkills = $_POST['eventSkills'];
  $eventDescription = $_POST['eventDescription'];
  $eventImage = $_FILES['eventImage'];
  $userID = 2; // قيمة ثابتة لـ UserID

  // التحقق من أن الحقول مطلوبة
  if (empty($eventName) || empty($eventStartDate) || empty($eventEndDate) || empty($eventLocation) || empty($eventSkills) || empty($eventDescription)) {
    echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
    exit;
  }

  // تحميل الصورة إذا تم تحميلها
  $target_file = null;
  if (!empty($eventImage['name'])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($eventImage["name"]);
    if (!move_uploaded_file($eventImage["tmp_name"], $target_file)) {
      echo json_encode(['status' => 'error', 'message' => 'فشل في تحميل الصورة.']);
      exit;
    }
  }

  // استعلام لتحديث الفعالية
  $query = "UPDATE events SET 
            EventName = :eventName, 
            StartDate = :startDate, 
            EndDate = :endDate, 
            Location = :location, 
            RequiredSkills = :skills, 
            Description = :description, 
            Image = COALESCE(:image, Image) 
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
      'eventID' => $eventID,
      'userID' => $userID
    ]);

    echo json_encode(['status' => 'success', 'message' => 'تم تعديل الفعالية بنجاح!']);
  } catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>