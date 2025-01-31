<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eventID'])) {
    $eventID = $_POST['eventID'];
    $eventName = $_POST['eventName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $location = $_POST['location'];
    $requiredSkills = $_POST['requiredSkills'];
    $description = $_POST['description'];

    try {
        // استعلام لتعديل الفعالية
        $query = "UPDATE events SET EventName = :eventName, StartDate = :startDate, EndDate = :endDate, Location = :location, RequiredSkills = :requiredSkills, Description = :description WHERE EventID = :eventID";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'eventID' => $eventID,
            'eventName' => $eventName,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'location' => $location,
            'requiredSkills' => $requiredSkills,
            'description' => $description
        ]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'message' => 'تم تعديل الفعالية بنجاح!']);
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