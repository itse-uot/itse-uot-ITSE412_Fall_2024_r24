<?php
include '../execute/dbconfig.php';

// التحقق من وجود الإجراء المطلوب
if (!isset($_GET['action'])) {
    die(json_encode(['success' => false, 'message' => 'الإجراء غير محدد']));
}

$action = $_GET['action'];

switch ($action) {
    case 'get_event':
        // جلب بيانات الفعالية
        if (!isset($_GET['eventId'])) {
            die(json_encode(['success' => false, 'message' => 'معرف الفعالية غير محدد']));
        }
        $eventId = $_GET['eventId'];
        $query = "SELECT * FROM events WHERE EventID = :eventId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($event) {
            echo json_encode($event);
        } else {
            echo json_encode(['success' => false, 'message' => 'الفعالية غير موجودة']);
        }
        break;

    case 'delete_event':
        // حذف الفعالية
        if (!isset($_GET['eventId'])) {
            die(json_encode(['success' => false, 'message' => 'معرف الفعالية غير محدد']));
        }
        $eventId = $_GET['eventId'];
        $query = "DELETE FROM events WHERE EventID = :eventId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $success = $stmt->execute();

        echo json_encode(['success' => $success]);
        break;

    case 'update_event':
        // تحديث بيانات الفعالية
        if (!isset($_GET['eventId'])) {
            die(json_encode(['success' => false, 'message' => 'معرف الفعالية غير محدد']));
        }
        $eventId = $_GET['eventId'];
        $eventName = $_POST['eventName'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $location = $_POST['location'];
        $requiredSkills = $_POST['requiredSkills'];
        $description = $_POST['description'];

        $query = "
            UPDATE events 
            SET EventName = :eventName, 
                StartDate = :startDate, 
                EndDate = :endDate, 
                Location = :location, 
                RequiredSkills = :requiredSkills, 
                Description = :description 
            WHERE EventID = :eventId
        ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':eventName', $eventName);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':requiredSkills', $requiredSkills);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $success = $stmt->execute();

        echo json_encode(['success' => $success]);
        break;

    default:
        die(json_encode(['success' => false, 'message' => 'الإجراء غير معروف']));
}
