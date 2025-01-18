<?php
session_start(); // بدء الجلسة
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استرجاع البيانات من النموذج
    $username = $_POST['username'];
    $password = $_POST['password'];

    // التحقق من أن الحقول مطلوبة
    if (empty($username) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
        exit;
    }

    // استعلام للتحقق من بيانات المستخدم
    $query = "SELECT * FROM Users WHERE Username = :username AND Password = :password";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password]);
        
        // استرجاع البيانات
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // إذا تم العثور على المستخدم، إرجاع رسالة نجاح
            $_SESSION['user'] = $user; // تخزين بيانات المستخدم في الجلسة
            echo json_encode(['status' => 'success', 'message' => 'تم تسجيل الدخول بنجاح']);
        } else {
            // إذا لم يتم العثور على المستخدم، إرجاع رسالة خطأ
            echo json_encode(['status' => 'error', 'message' => 'اسم المستخدم أو كلمة المرور غير صحيحة.']);
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>