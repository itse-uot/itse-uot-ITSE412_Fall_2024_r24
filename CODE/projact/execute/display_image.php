<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'dbconfig.php';

// الحصول على ID المستخدم من الرابط
$id = $_GET['id'];

// استعلام SQL لجلب الصورة بناءً على ID
$sql = "SELECT ProfilePicture FROM tatawoe WHERE ID = :id";

try {
    // تحضير الاستعلام
    $stmt = $conn->prepare($sql);
    // ربط المتغير `id` بالقيمة
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // تنفيذ الاستعلام
    $stmt->execute();

    // التحقق من وجود بيانات
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($row["image_path"])) {
            // تعيين رأس HTTP لصورة PNG
            header("Content-Type: image/png");
            // عرض الصورة
            echo $row["image_path"];
        } else {
            echo "لا توجد صورة لهذا المستخدم.";
        }
    } else {
        echo "لا توجد بيانات لهذا المستخدم.";
    }
} catch (PDOException $e) {
    echo "خطأ أثناء جلب البيانات: " . $e->getMessage();
}
?>
