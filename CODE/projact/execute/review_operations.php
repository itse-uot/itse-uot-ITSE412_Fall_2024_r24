<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تحديد نوع العملية (إضافة، تعديل، حذف)
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            // إضافة تقييم جديد
            $eventID = $_POST['eventID'];
            $volunteerID = $_POST['volunteerID'];
            $rating = $_POST['rating'];
            $reviewText = $_POST['reviewText'];

            if (empty($eventID) || empty($volunteerID) || empty($rating) || empty($reviewText)) {
                echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
                exit;
            }

            $query = "INSERT INTO RatingsAndReviews (EventID, VolunteerID, Rating, ReviewText) VALUES (:eventID, :volunteerID, :rating, :reviewText)";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    'eventID' => $eventID,
                    'volunteerID' => $volunteerID,
                    'rating' => $rating,
                    'reviewText' => $reviewText
                ]);
                echo json_encode(['status' => 'success', 'message' => 'تم إرسال التقييم بنجاح!']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
            }
            break;

        case 'update':
            // تعديل تقييم موجود
            $reviewID = $_POST['reviewID'];
            $rating = $_POST['rating'];
            $reviewText = $_POST['reviewText'];

            if (empty($reviewID) || empty($rating) || empty($reviewText)) {
                echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
                exit;
            }

            $query = "UPDATE RatingsAndReviews SET Rating = :rating, ReviewText = :reviewText WHERE ReviewID = :reviewID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    'rating' => $rating,
                    'reviewText' => $reviewText,
                    'reviewID' => $reviewID
                ]);
                echo json_encode(['status' => 'success', 'message' => 'تم تعديل التقييم بنجاح!']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
            }
            break;

        case 'delete':
            // حذف تقييم
            $reviewID = $_POST['reviewID'];

            if (empty($reviewID)) {
                echo json_encode(['status' => 'error', 'message' => 'لم يتم تحديد التقييم المطلوب حذفه.']);
                exit;
            }

            $query = "DELETE FROM RatingsAndReviews WHERE ReviewID = :reviewID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute(['reviewID' => $reviewID]);
                echo json_encode(['status' => 'success', 'message' => 'تم حذف التقييم بنجاح!']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
            }
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'عملية غير معروفة.']);
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // جلب التقييمات السابقة
    $eventID = $_GET['eventID'];
    $query = "SELECT * FROM RatingsAndReviews WHERE EventID = :eventID";
    
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute(['eventID' => $eventID]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['status' => 'success', 'reviews' => $reviews]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
    }
}
?>