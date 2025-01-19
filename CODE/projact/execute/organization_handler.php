<?php
session_start();
include 'dbconfig.php';

// إعداد عرض الأخطاء (للتطوير فقط)
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');

// التحقق من الجلسة
if (!isset($_SESSION['user']['UserID'])) {
    echo json_encode(['status' => 'error', 'message' => 'غير مصرح بالوصول. يرجى تسجيل الدخول أولاً.']);
    exit;
}

$userID = $_SESSION['user']['UserID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    switch ($action) {
        case 'fetch':
            // جلب المنظمات
            $query = "SELECT OrganizationID, OrganizationName, Field, Location, OrganizationPicture 
                      FROM Organizations 
                      WHERE UserID = :userID";
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute(['userID' => $userID]);
                $organizations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // معالجة الصور (base64)
                foreach ($organizations as &$org) {
                    $org['OrganizationPicture'] = $org['OrganizationPicture']
                        ? base64_encode($org['OrganizationPicture'])
                        : null;
                }

                echo json_encode(['status' => 'success', 'data' => $organizations]);
            } catch (Exception $e) {
                error_log('Error fetching organizations: ' . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء جلب المنظمات.']);
            }
            break;

        case 'add':
            // إضافة منظمة
            $organizationName = $_POST['organizationName'] ?? null;
            $description = $_POST['description'] ?? null;
            $field = $_POST['field'] ?? null;
            $location = $_POST['location'] ?? null;
            $contactEmail = $_POST['contactEmail'] ?? null;
            $phoneNumber = $_POST['phoneNumber'] ?? null;

            if (empty($organizationName) || empty($description) || empty($field) || empty($location) || empty($contactEmail) || empty($phoneNumber)) {
                echo json_encode(['status' => 'error', 'message' => 'يرجى ملء جميع الحقول المطلوبة.']);
                exit;
            }

            if (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['status' => 'error', 'message' => 'البريد الإلكتروني غير صالح.']);
                exit;
            }

            $profilePicture = null;
            if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === 0) {
                $profilePicture = file_get_contents($_FILES['profilePicture']['tmp_name']);
            }

            $query = "INSERT INTO Organizations 
                      (OrganizationName, Description, Field, Location, ContactEmail, PhoneNumber, OrganizationPicture, UserID) 
                      VALUES 
                      (:organizationName, :description, :field, :location, :contactEmail, :phoneNumber, :profilePicture, :userID)";

            try {
                $stmt = $conn->prepare($query);
                $stmt->execute([
                    ':organizationName' => $organizationName,
                    ':description' => $description,
                    ':field' => $field,
                    ':location' => $location,
                    ':contactEmail' => $contactEmail,
                    ':phoneNumber' => $phoneNumber,
                    ':profilePicture' => $profilePicture,
                    ':userID' => $userID
                ]);

                echo json_encode(['status' => 'success', 'message' => 'تم إضافة المنظمة بنجاح.']);
            } catch (Exception $e) {
                error_log('Error adding organization: ' . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء إضافة المنظمة.']);
            }
            break;

        case 'delete':
            // حذف منظمة
            $organizationID = $_POST['organizationID'] ?? null;

            if (!$organizationID) {
                echo json_encode(['status' => 'error', 'message' => 'رقم المنظمة غير موجود.']);
                exit;
            }

            $query = "DELETE FROM Organizations WHERE OrganizationID = :organizationID AND UserID = :userID";

            try {
                $stmt = $conn->prepare($query);
                $stmt->execute(['organizationID' => $organizationID, 'userID' => $userID]);

                if ($stmt->rowCount() > 0) {
                    echo json_encode(['status' => 'success', 'message' => 'تم حذف المنظمة بنجاح.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'لم يتم العثور على المنظمة أو ليس لديك الصلاحية لحذفها.']);
                }
            } catch (Exception $e) {
                error_log('Error deleting organization: ' . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء حذف المنظمة.']);
            }
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'الإجراء غير معروف.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح.']);
}
?>
