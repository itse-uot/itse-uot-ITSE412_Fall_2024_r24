<?php
session_start();
 
include 'dbconfig.php'; // تأكد من أن ملف الاتصال بقاعدة البيانات صحيح

// تحقق إذا تم إرسال الطلب
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استرجاع بيانات المتطوع
    $volunteerId = $_SESSION['userID'] ;  // افترضنا أن الـ ID يتم إرساله في الطلب

    // استعلام لاسترجاع بيانات المتطوع
    $query = "SELECT FullName, ContactEmail, Skills, ContactNumber, ProfilePicture FROM Volunteers WHERE VolunteerID = :volunteerId";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['volunteerId' => $volunteerId]);
        
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
                    'ContactEmail' => $data['ContactEmail'],
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

