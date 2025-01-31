<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// جلب التقييمات من قاعدة البيانات
if (isset($_GET['eventID'])) {
    $eventID = $_GET['eventID'];
    $query = "SELECT * FROM reviews WHERE EventID = :eventID";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['eventID' => $eventID]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['status' => 'success', 'reviews' => $reviews]);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'معرّف الفعالية غير موجود.']);
}
?>