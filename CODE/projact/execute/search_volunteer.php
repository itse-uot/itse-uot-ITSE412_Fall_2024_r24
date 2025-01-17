<?php
// الاتصال بقاعدة البيانات
include 'dbconfig.php'; // قم بتضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    $query = trim($_POST['query']);

    // استعلام البحث
    $stmt = $conn->prepare("SELECT id, FullName, ContactEmail, ProfilePicture FROM volunteers WHERE FullName LIKE ?");
    $searchTerm = "%$query%";
    $stmt->bind_param('s', $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // إنشاء مصفوفة النتائج
    $volunteers = [];
    while ($row = $result->fetch_assoc()) {
        $volunteers[] = [
            'id' => $row['id'], // المعرف الفريد
            'name' => $row['FullName'], // الاسم الكامل
            'email' => $row['ContactEmail'], // البريد الإلكتروني
            'image' => $row['ProfilePicture'], // رابط الصورة
        ];
    }

    // إعادة النتائج بصيغة JSON
    header('Content-Type: application/json');
    echo json_encode($volunteers);
}
?>