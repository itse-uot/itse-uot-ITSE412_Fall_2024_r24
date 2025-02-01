<?php
session_start(); // بدء الجلسة
include 'dbconfig.php'; // ملف الاتصال بقاعدة البيانات

// التحقق من وجود المستخدم في الجلسة
if (!isset($_SESSION['user']['UserID'])) {
    echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول']);
    exit;
}

$userID = $_SESSION['user']['UserID']; // استخدام userID من الجلسة

// إذا كان الطلب من نوع POST (إلغاء الطلب)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق من وجود applicationID في البيانات المرسلة
    if (!isset($_POST['applicationID'])) {
        echo json_encode(['status' => 'error', 'message' => 'معرف الطلب غير موجود.']);
        exit;
    }

    $applicationID = $_POST['applicationID']; // الحصول على معرف الطلب

    // التحقق من أن الطلب في حالة Pending
    $query = "SELECT ApplicationStatus FROM applications WHERE ApplicationID = :applicationID AND UserID = :userID";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['applicationID' => $applicationID, 'userID' => $userID]);
        $application = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($application && $application['ApplicationStatus'] === 'Pending') {
            // حذف الطلب
            $deleteQuery = "DELETE FROM applications WHERE ApplicationID = :applicationID";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->execute(['applicationID' => $applicationID]);

            // إرسال استجابة نجاح
            echo json_encode(['status' => 'success', 'message' => 'تم إلغاء الطلب بنجاح.']);
        } else {
            // إرسال استجابة خطأ إذا لم يكن الطلب في حالة Pending
            echo json_encode(['status' => 'error', 'message' => 'لا يمكن إلغاء هذا الطلب.']);
        }
    } catch (Exception $e) {
        // إرسال استجابة خطأ في حالة حدوث استثناء
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء إلغاء الطلب: ' . $e->getMessage()]);
    }
} else {
    // إرسال استجابة خطأ إذا لم يكن الطلب من نوع POST
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>