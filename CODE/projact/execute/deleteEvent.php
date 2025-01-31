<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eventID'])) {
    $eventID = $_POST['eventID'];

    try {
        // استعلام لحذف الفعالية
        $query = "DELETE FROM events WHERE EventID = :eventID";
        $stmt = $conn->prepare($query);
        $stmt->execute(['eventID' => $eventID]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'تم حذف الفعالية بنجاح!']);
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