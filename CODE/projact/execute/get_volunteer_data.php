<?php
session_start();
 
include 'dbconfig.php'; // تأكد من أن ملف الاتصال بقاعدة البيانات صحيح

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استرجاع بيانات المتطوع
    $UserId = isset($_POST['userid']) ? $_POST['userid'] : $_SESSION['user']['UserID'];  // افترضنا أن الـ ID يتم إرساله في الطلب
    // $UserId =  $_SESSION['user']['UserID'];
    // استعلام لاسترجاع بيانات المتطوع
    $query = "SELECT FullName, Email, Skills, ContactNumber, ProfilePicture FROM users WHERE UserID = :UserId";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['UserId' => $UserId]);
        
        // استرجاع البيانات كـ مصفوفة
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // تأكد من وجود البيانات
        if ($data) {
            // إعادة البيانات كـ JSON
            echo json_encode(
                [
                'status' => 'success',
                'data' => [
                    'FullName' => $data['FullName'],
                    'Email' => $data['Email'],
                    'Skills' => $data['Skills'],
                    'ContactNumber' => $data['ContactNumber'],
                    'ProfilePicture' => base64_encode($data['ProfilePicture']), // تحويل الصورة إلى Base64
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'لا توجد بيانات.']);
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>

