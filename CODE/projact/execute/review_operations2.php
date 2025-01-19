<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['eventID'])) {
    $eventID = $_GET['eventID'];

    // استعلام لاسترجاع التقييمات الخاصة بالفعالية
    $query = "SELECT * FROM ratingsandreviews WHERE EventID = :eventID";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['eventID' => $eventID]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($reviews) {
            echo json_encode(['status' => 'success', 'reviews' => $reviews]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لا توجد تقييمات لهذه الفعالية.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>