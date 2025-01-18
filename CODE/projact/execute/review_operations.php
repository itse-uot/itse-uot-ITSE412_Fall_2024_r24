<?php
session_start(); // بدء الجلسة
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// التحقق من أن المستخدم مسجل الدخول
if (!isset($_SESSION['UserID'])) {
    echo json_encode(['status' => 'error', 'message' => 'يجب تسجيل الدخول أولاً.']);
    exit;
}

$userID = $_SESSION['UserID']; // الحصول على معرف المستخدم من الجلسة

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تحديد نوع العملية (إضافة، تعديل، حذف)
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            // إضافة تقييم جديد
            $eventID = $_POST['eventID'];
            $rating = $_POST['rating'];
            $reviewText = $_POST['reviewText'];

            if (empty($eventID) || empty($rating) || empty($reviewText)) {
                echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
                exit;
            }

            // إضافة التقييم باستخدام UserID
            $query = "INSERT INTO RatingsAndReviews (EventID, UserID, Rating, ReviewText) VALUES (:eventID, :userID, :rating, :reviewText)";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    'eventID' => $eventID,
                    'userID' => $userID, // استخدام UserID من الجلسة
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

            // التحقق من أن المستخدم هو صاحب التقييم
            $query = "SELECT UserID FROM RatingsAndReviews WHERE ReviewID = :reviewID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute(['reviewID' => $reviewID]);
                $review = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($review && $review['UserID'] == $userID) {
                    // إذا كان المستخدم هو صاحب التقييم، يتم التعديل
                    $query = "UPDATE RatingsAndReviews SET Rating = :rating, ReviewText = :reviewText WHERE ReviewID = :reviewID";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                        'rating' => $rating,
                        'reviewText' => $reviewText,
                        'reviewID' => $reviewID
                    ]);
                    echo json_encode(['status' => 'success', 'message' => 'تم تعديل التقييم بنجاح!']);
                } else {
                    // إذا لم يكن المستخدم هو صاحب التقييم
                    echo json_encode(['status' => 'error', 'message' => 'غير مسموح لك بتعديل هذا التقييم.']);
                }
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

            // التحقق من أن المستخدم هو صاحب التقييم
            $query = "SELECT UserID FROM RatingsAndReviews WHERE ReviewID = :reviewID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute(['reviewID' => $reviewID]);
                $review = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($review && $review['UserID'] == $userID) {
                    // إذا كان المستخدم هو صاحب التقييم، يتم الحذف
                    $query = "DELETE FROM RatingsAndReviews WHERE ReviewID = :reviewID";
                    $stmt = $conn->prepare($query);
                    $stmt->execute(['reviewID' => $reviewID]);
                    echo json_encode(['status' => 'success', 'message' => 'تم حذف التقييم بنجاح!']);
                } else {
                    // إذا لم يكن المستخدم هو صاحب التقييم
                    echo json_encode(['status' => 'error', 'message' => 'غير مسموح لك بحذف هذا التقييم.']);
                }
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