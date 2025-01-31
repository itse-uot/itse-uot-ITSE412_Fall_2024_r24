<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// جلب organizationID من الطلب
$organizationID = $_GET['organizationID'] ?? null;

if (!$organizationID) {
    echo json_encode(['status' => 'error', 'message' => 'معرّف المنظمة غير موجود.']);
    exit;
}

// استعلام لجلب الفعاليات الخاصة بالمنظمة
$query = "
    SELECT 
        e.EventID, 
        e.EventName, 
        e.Description, 
        e.Location, 
        e.StartDate, 
        e.EndDate, 
        e.RequiredSkills, 
        e.Image 
    FROM events e
    WHERE e.OrganizationID = :organizationID
    ORDER BY e.StartDate ASC;
";

try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['organizationID' => $organizationID]);
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // إرجاع البيانات بتنسيق JSON
    echo json_encode([
        'status' => 'success',
        'events' => $events
    ]);
} catch (PDOException $e) {
    // إرجاع رسالة الخطأ بتنسيق JSON
    echo json_encode([
        'status' => 'error',
        'message' => 'حدث خطأ: ' . $e->getMessage()
    ]);
}
?>