<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// استعلام لاسترجاع جميع الفعاليات
$query = "SELECT * FROM events"; // استرجاع جميع الفعاليات
try {
    $stmt = $conn->prepare($query);
    $stmt->execute(); // تنفيذ الاستعلام
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC); // استرجاع جميع الفعاليات

    // إرجاع البيانات كـ JSON
    echo json_encode(['status' => 'success', 'data' => $events]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
}
?>