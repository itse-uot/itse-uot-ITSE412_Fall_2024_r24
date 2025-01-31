<?php
session_start(); // بدء الجلسة
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استرجاع البيانات من النموذج
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $skills = $_POST['skills'];
    $contactNumber = $_POST['contactNumber'];
    $profilePicture = $_FILES['profileImage'];

    // التحقق من أن الحقول مطلوبة
    if (empty($username) || empty($email) || empty($password) || empty($fullName) || empty($skills) || empty($contactNumber)) {
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
    $query = "SELECT * FROM users WHERE Username = :username";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode(['status' => 'error', 'message' => 'اسم المستخدم موجود مسبقًا.']);
            exit;
        }

        // التحقق من أن البريد الإلكتروني غير موجود من قبل
        $query = "SELECT * FROM users WHERE Email = :email";
        $stmt = $conn->prepare($query);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode(['status' => 'error', 'message' => 'البريد الإلكتروني موجود مسبقًا.']);
            exit;
        }

        // تحميل صورة الملف الشخصي إذا تم تحميلها
        $profilePictureBlob = null;
        if ($profilePicture['error'] === UPLOAD_ERR_OK) {
            // قراءة محتوى الصورة كـ BLOB
            $profilePictureBlob = file_get_contents($profilePicture['tmp_name']);
        }

        // إضافة المستخدم الجديد إلى جدول users
        $query = "INSERT INTO users (Username, Email, Password, FullName, Skills, ProfilePicture, ContactNumber, CreatedAt, UpdatedAt) 
                  VALUES (:username, :email, :password, :fullName, :skills, :profilePicture, :contactNumber, NOW(), NOW())";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password, // كلمة المرور غير مشفرة (كما هو مطلوب)
            'fullName' => $fullName,
            'skills' => $skills,
            'profilePicture' => $profilePictureBlob, // تخزين الصورة كـ BLOB
            'contactNumber' => $contactNumber
        ]);

        echo json_encode(['status' => 'success', 'message' => 'تم إنشاء الحساب بنجاح. سيتم توجيهك إلى صفحة تسجيل الدخول.']);

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>