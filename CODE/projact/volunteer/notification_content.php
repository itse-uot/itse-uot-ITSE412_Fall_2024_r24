<<?php
// تضمين ملف قاعدة البيانات
include '../execute/dbconfig.php';

// استعلام SQL لجلب الإشعارات الخاصة بالمستخدم
$sql = "SELECT * FROM notifications WHERE UserID = ? ORDER BY CreatedAt DESC";

// تجهيز الاستعلام باستخدام prepare()
$stmt = $conn->prepare($sql);

// تحقق إذا كان الاستعلام قد تم تجهيزه بنجاح
if (!$stmt) {
    die("Failed to prepare statement: " . $conn->error);
}

// تعريف متغير UserID وتمريره
$userId = 1; // استبدل هذا الرقم بمعرّف المستخدم الفعلي

// ربط المعاملات مع الاستعلام
if (!$stmt->bind_param("i", $userId)) {
    die("Failed to bind parameters: " . $stmt->error);
}

// تنفيذ الاستعلام
if (!$stmt->execute()) {
    die("Failed to execute statement: " . $stmt->error);
}

// الحصول على النتائج
$result = $stmt->get_result();

// التحقق من النتائج وعرضها
if ($result && $result->num_rows > 0): 
    while ($row = $result->fetch_assoc()): 
?>
        <!-- عرض البيانات -->
        <div class="notification-item" style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            <i class="bi 
                <?php
                // تحديد الأيقونة حسب نوع الإشعار
                switch ($row['NotificationType']) {
                    case 'Request': echo 'bi-exclamation-circle text-warning'; break;
                    case 'EventUpdate': echo 'bi-info-circle text-primary'; break;
                    case 'AccountUpdate': echo 'bi-check-circle text-success'; break;
                    case 'General': echo 'bi-bell text-secondary'; break;
                    default: echo 'bi-bell'; break;
                }
                ?>" style="font-size: 24px; margin-left: 10px;"></i>
            <div>
                <h4 style="margin: 0; font-size: 18px;"><?php echo htmlspecialchars($row['Message']); ?></h4>
                <p style="margin: 0; font-size: 14px; color: #888;"><?php echo htmlspecialchars($row['CreatedAt']); ?></p>
            </div>
        </div>
<?php 
    endwhile; 
else: 
?>
    <!-- رسالة في حالة عدم وجود إشعارات -->
    <p style="text-align: center; color: #666;">لا توجد إشعارات حالياً.</p>
<?php 
endif; 

// إغلاق الاستعلام والاتصال
$stmt->close();
$conn->close();
?>
