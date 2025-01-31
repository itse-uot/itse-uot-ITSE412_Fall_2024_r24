<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// جلب الفعاليات من قاعدة البيانات
$query = "SELECT * FROM events";
try {
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['status' => 'success', 'events' => $events]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
}
?>