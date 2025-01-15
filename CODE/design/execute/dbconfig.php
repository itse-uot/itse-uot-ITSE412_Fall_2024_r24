<?php
// ملف config.php لإنشاء اتصال بقاعدة البيانات

// معلومات الاتصال بقاعدة البيانات
$host = 'localhost'; // اسم المضيف (عادة localhost)
$dbname = 'tatawoe'; // اسم قاعدة البيانات
$username = 'root'; // اسم المستخدم لقاعدة البيانات
$password = ''; // كلمة المرور لقاعدة البيانات

// محاولة الاتصال بقاعدة البيانات باستخدام PDO
try {
    // إنشاء كائن PDO للاتصال بقاعدة البيانات
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // تعيين وضع الخطأ ليكون استثناء (Exception) لتسهيل التعامل مع الأخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("USE $dbname");
    // تعيين ترميز الأحرف إلى UTF-8 لضمان التعامل الصحيح مع اللغة العربية
    $conn->exec("SET NAMES 'utf8'");
    
    // رسالة نجاح الاتصال (يمكن إزالتها في الإنتاج)
    echo "تم الاتصال بنجاح بقاعدة البيانات!";
    
} catch (PDOException $e) {
    // في حالة فشل الاتصال، يتم إظهار رسالة الخطأ
    echo "فشل الاتصال بقاعدة البيانات: " . $e->getMessage();
}
?>