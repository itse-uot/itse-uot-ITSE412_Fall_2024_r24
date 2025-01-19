<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['eventID'])) {
  $eventID = $_GET['eventID']; // استخراج eventID من الطلب

  // استعلام لاسترجاع بيانات الفعالية
  $query = "SELECT * FROM events WHERE EventID = :eventID";
  try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['eventID' => $eventID]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($event) {
      echo json_encode(['status' => 'success', 'data' => $event]);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على الفعالية.']);
    }
  } catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>