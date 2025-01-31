<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات
//يجب بيانات الفعالية في وظيفة التعديل 
// جلب EventID من الطلب
$eventID = $_GET['eventID'] ?? null;

if (!$eventID) {
    echo json_encode(['status' => 'error', 'message' => 'معرّف الفعالية غير موجود.']);
    exit;
}

// استعلام لجلب تفاصيل الفعالية
$query = "
    SELECT 
        EventID, 
        EventName, 
        Description, 
        Location, 
        StartDate, 
        EndDate, 
        RequiredSkills, 
        Image 
    FROM events 
    WHERE EventID = :eventID;
";

try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['eventID' => $eventID]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($event) {
        // إرجاع البيانات بتنسيق JSON
        echo json_encode([
            'status' => 'success',
            'event' => $event
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'الفعالية غير موجودة.'
        ]);
    }
} catch (PDOException $e) {
    // إرجاع رسالة الخطأ بتنسيق JSON
    echo json_encode([
        'status' => 'error',
        'message' => 'حدث خطأ: ' . $e->getMessage()
    ]);
}
?>