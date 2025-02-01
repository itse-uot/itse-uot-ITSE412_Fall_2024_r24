<?php
session_start();
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// التحقق من وجود جلسة المستخدم أو المنظمة
if (!isset($_SESSION['user']['UserID']) && !isset($_SESSION['org'])) {
    die("غير مصرح بالوصول.");
}

// تحديد المستخدم أو المنظمة الحالية
$userID = $_SESSION['user']['UserID'] ?? null;
$orgID = $_SESSION['org']['OrganizationID'] ?? null;

// جلب الإشعارات من قاعدة البيانات
try {
    if ($userID) {
        // جلب إشعارات المستخدم
        $query = "SELECT * FROM notifications WHERE UserID = :userID ORDER BY CreatedAt DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute(['userID' => $userID]);
    } elseif ($orgID) {
        // جلب إشعارات المنظمة
        $query = "SELECT * FROM notifications WHERE TargetID = :orgID AND TargetType = 'Organization' ORDER BY CreatedAt DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute(['orgID' => $orgID]);
    } else {
        die("لا توجد بيانات متاحة.");
    }

    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($notifications) > 0) {
        foreach ($notifications as $notification) {
            $iconClass = "";
            $textColor = "";
            // تحديد الأيقونة بناءً على نوع الإشعار
            switch ($notification['NotificationType']) {
                case 'Request':
                    $iconClass = "bi-exclamation-circle text-warning";
                    break;
                case 'EventUpdate':
                    $iconClass = "bi-info-circle text-primary";
                    break;
                case 'AccountUpdate':
                    $iconClass = "bi-check-circle text-success";
                    break;
                case 'General':
                    $iconClass = "bi-bell text-secondary";
                    break;
                default:
                    $iconClass = "bi-bell text-secondary";
            }
            ?>
            <div class="notification-item d-flex align-items-center mb-3 p-3 border-bottom" data-notification-id="<?php echo $notification['NotificationID']; ?>">
                <i class="bi <?php echo $iconClass; ?>" style="font-size: 24px; margin-left: 10px;"></i>
                <div>
                    <h4 class="mb-1"><?php echo htmlspecialchars($notification['Message']); ?></h4>
                    <p class="mb-0 text-muted"><?php echo htmlspecialchars($notification['CreatedAt']); ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p class='text-center'>لا توجد إشعارات لعرضها.</p>";
    }
} catch (Exception $e) {
    echo "<p class='text-center text-danger'>حدث خطأ أثناء جلب الإشعارات: " . $e->getMessage() . "</p>";
}
?>