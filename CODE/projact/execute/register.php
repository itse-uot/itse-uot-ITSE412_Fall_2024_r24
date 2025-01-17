<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استرجاع البيانات من النموذج
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // التحقق من أن الحقول مطلوبة
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
        exit;
    }

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'البريد الإلكتروني غير صحيح.']);
        exit;
    }

    // التحقق من قوة كلمة المرور
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        echo json_encode(['status' => 'error', 'message' => 'كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل وتحتوي على أرقام وحروف إنجليزية.']);
        exit;
    }

    // التحقق من أن اسم المستخدم غير موجود من قبل
    $query = "SELECT * FROM Users WHERE Username = :username";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode(['status' => 'error', 'message' => 'اسم المستخدم موجود مسبقًا.']);
            exit;
        }

        // التحقق من أن البريد الإلكتروني غير موجود من قبل
        $query = "SELECT * FROM Users WHERE Email = :email";
        $stmt = $conn->prepare($query);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode(['status' => 'error', 'message' => 'البريد الإلكتروني موجود مسبقًا.']);
            exit;
        }

        // إضافة المستخدم الجديد إلى قاعدة البيانات
        $query = "INSERT INTO Users (Username, Email, Password, CreatedAt, UpdatedAt) 
                  VALUES (:username, :email, :password, NOW(), NOW())";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

        echo json_encode(['status' => 'success', 'message' => 'تم إنشاء الحساب بنجاح. سيتم توجيهك إلى صفحة تسجيل الدخول.']);

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>