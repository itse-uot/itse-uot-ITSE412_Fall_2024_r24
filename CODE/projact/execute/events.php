<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// قيمة ثابتة لـ UserID
$userID = 2; // يمكن تغيير هذه القيمة حسب الحاجة

// استعلام لاسترجاع الفعاليات الخاصة بالمنظمة مع التقييمات
$query = "
    SELECT 
        e.*, 
        COALESCE(AVG(r.Rating), 0) AS AverageRating, 
        COUNT(r.ReviewID) AS TotalRatings 
    FROM events e
    LEFT JOIN ratingsandreviews r ON e.EventID = r.EventID
    WHERE e.UserID = :userID
    GROUP BY e.EventID
";
try {
    $stmt = $conn->prepare($query);
    $stmt->execute(['userID' => $userID]); // تنفيذ الاستعلام مع UserID
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC); // استرجاع جميع الفعاليات

    // إرجاع البيانات كـ JSON
    echo json_encode(['status' => 'success', 'data' => $events]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
}
?>