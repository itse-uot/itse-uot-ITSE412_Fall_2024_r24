<?php
session_start();
include 'dbconfig.php';


$userID = $_SESSION['user']['UserID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $eventID = $_POST['eventID'];
            $rating = $_POST['rating'];
            $reviewText = $_POST['reviewText'];

            if (empty($eventID) || empty($rating) || empty($reviewText)) {
                echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
                exit;
            }

            $query = "INSERT INTO RatingsAndReviews (EventID, UserID, Rating, ReviewText) VALUES (:eventID, :userID, :rating, :reviewText)";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    'eventID' => $eventID,
                    'userID' => $userID,
                    'rating' => $rating,
                    'reviewText' => $reviewText
                ]);
                echo json_encode(['status' => 'success', 'message' => 'تم إرسال التقييم بنجاح!']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
            }
            break;

        case 'update':
            $reviewID = $_POST['reviewID'];
            $rating = $_POST['rating'];
            $reviewText = $_POST['reviewText'];

            if (empty($reviewID) || empty($rating) || empty($reviewText)) {
                echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
                exit;
            }

            $query = "UPDATE RatingsAndReviews SET Rating = :rating, ReviewText = :reviewText WHERE ReviewID = :reviewID AND UserID = :userID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    'rating' => $rating,
                    'reviewText' => $reviewText,
                    'reviewID' => $reviewID,
                    'userID' => $userID
                ]);
                echo json_encode(['status' => 'success', 'message' => 'تم تعديل التقييم بنجاح!']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ: ' . $e->getMessage()]);
            }
            break;

        case 'delete':
            $reviewID = $_POST['reviewID'];

            if (empty($reviewID)) {
                echo json_encode(['status' => 'error', 'message' => 'لم يتم تحديد التقييم المطلوب حذفه.']);
                exit;
            }

            $query = "DELETE FROM RatingsAndReviews WHERE ReviewID = :reviewID AND UserID = :userID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    'reviewID' => $reviewID,
                    'userID' => $userID
                ]);
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