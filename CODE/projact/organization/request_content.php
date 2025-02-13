<?php


session_start(); // بدء الجلسة
include '../execute/dbconfig.php'; // تضمين ملف اتصال قاعدة البيانات

// التحقق من الجلسة ومعرف المنظمة
if (!isset($_SESSION['org'])) {
    die(json_encode(['status' => 'error', 'message' => 'خطأ: لم يتم العثور على بيانات المنظمة.']));
}

$orgID = $_SESSION['org'];

// معالجة طلبات POST (قبول أو رفض الطلبات)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $applicationID = $_POST['applicationID'] ?? null;

    if (!$applicationID) {
        echo json_encode(['status' => 'error', 'message' => 'رقم الطلب غير موجود.']);
        exit;
    }

    try {
        // التحقق من أن الطلب ينتمي إلى المنظمة
        $checkQuery = "SELECT events.OrganizationID 
                       FROM applications 
                       INNER JOIN events ON applications.EventID = events.EventID 
                       WHERE applications.ApplicationID = :applicationID";
        $stmt = $conn->prepare($checkQuery);
        $stmt->execute(['applicationID' => $applicationID]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result || $result['OrganizationID'] != $orgID) {
            echo json_encode(['status' => 'error', 'message' => 'غير مصرح لك بتنفيذ هذا الإجراء.']);
            exit;
        }

        // تنفيذ الإجراء (قبول أو رفض)
        if ($action === 'accept') {
            $stmt = $conn->prepare("UPDATE applications SET ApplicationStatus = 'Accepted' WHERE ApplicationID = :applicationID");
            $stmt->execute(['applicationID' => $applicationID]);
            echo json_encode(['status' => 'success', 'message' => 'تم قبول الطلب بنجاح.']);
        } elseif ($action === 'reject') {
            $stmt = $conn->prepare("UPDATE applications SET ApplicationStatus = 'Rejected' WHERE ApplicationID = :applicationID");
            $stmt->execute(['applicationID' => $applicationID]);
            echo json_encode(['status' => 'success', 'message' => 'تم رفض الطلب بنجاح.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'الإجراء غير معروف.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء معالجة الطلب: ' . $e->getMessage()]);
    }
    exit;
}

// جلب الطلبات من قاعدة البيانات
$pendingRequestsQuery = "SELECT applications.ApplicationID, applications.ApplicationStatus, 
                                users.FullName, users.Email, users.ContactNumber, users.ProfilePicture,
                                events.EventName, events.Location, applications.CreatedAt 
                         FROM applications 
                         INNER JOIN users ON applications.UserID = users.UserID 
                         INNER JOIN events ON applications.EventID = events.EventID 
                         WHERE applications.ApplicationStatus = 'Pending' AND events.OrganizationID = :orgID";

$acceptedRequestsQuery = "SELECT applications.ApplicationID, applications.ApplicationStatus, 
                                  users.FullName, users.Email, users.ContactNumber, users.ProfilePicture,
                                  events.EventID, events.EventName, events.Location, applications.CreatedAt 
                           FROM applications 
                           INNER JOIN users ON applications.UserID = users.UserID 
                           INNER JOIN events ON applications.EventID = events.EventID 
                           WHERE applications.ApplicationStatus = 'Accepted' AND events.OrganizationID = :orgID 
                           ORDER BY events.EventID";

try {
    $stmt = $conn->prepare($pendingRequestsQuery);
    $stmt->execute([':orgID' => $orgID]);
    $pendingRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare($acceptedRequestsQuery);
    $stmt->execute([':orgID' => $orgID]);
    $acceptedRequests = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $request) {
        $eventID = $request['EventID'];
        if (!isset($acceptedRequests[$eventID])) {
            $acceptedRequests[$eventID] = [
                'EventName' => $request['EventName'],
                'Location' => $request['Location'],
                'Applications' => []
            ];
        }
        $acceptedRequests[$eventID]['Applications'][] = $request;
    }
} catch (PDOException $e) {
    die("خطأ في جلب البيانات: " . $e->getMessage());
}
?>

<main id="main" class="main">
    <h1>إدارة الطلبات</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">الطلبات</h5>
            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">الطلبات المقدمة</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">الطلبات المقبولة</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade active show" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                    <?php if (empty($pendingRequests)): ?>
                        <div class="alert alert-info">لا توجد طلبات مقدمة.</div>
                    <?php else: ?>
                        <?php foreach ($pendingRequests as $request): ?>
                            <div class="card w-100 mb-3 py-2">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="data:image/jpeg;base64,<?= base64_encode($request['ProfilePicture']) ?>"
                                            alt="Profile" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div>
                                            <h5 class="card-title mb-0"><?= $request['FullName'] ?></h5>
                                            <small><?= $request['Email'] ?></small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small><strong>فعالية:</strong> <?= $request['EventName'] ?></small><br>
                                        <small><strong>الموقع:</strong> <?= $request['Location'] ?></small>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-primary accept-btn" data-id="<?= $request['ApplicationID'] ?>">قبول</button>
                                        <button class="btn btn-sm btn-danger reject-btn" data-id="<?= $request['ApplicationID'] ?>">رفض</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <?php if (empty($acceptedRequests)): ?>
                        <div class="alert alert-info">لا توجد طلبات مقبولة.</div>
                    <?php else: ?>
                        <?php foreach ($acceptedRequests as $eventID => $event): ?>
                            <div class="card w-100 mb-3 py-2">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $event['EventName'] ?></h5>
                                    <p><?= $event['Location'] ?></p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>رقم الهاتف</th>
                                                <th>البريد الإلكتروني</th>
                                                <th>تاريخ التقديم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($event['Applications'] as $request): ?>
                                                <tr>
                                                    <td><?= $request['FullName'] ?></td>
                                                    <td><?= $request['ContactNumber'] ?></td>
                                                    <td><?= $request['Email'] ?></td>
                                                    <td><?= $request['CreatedAt'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        // استماع للنقر على أزرار القبول أو الرفض
        $(document).on('click', '.accept-btn, .reject-btn', function(e) {
            e.preventDefault(); // منع السلوك الافتراضي

            const applicationID = $(this).data('id'); // الحصول على رقم الطلب
            const action = $(this).hasClass('accept-btn') ? 'accept' : 'reject'; // تحديد الإجراء

            // إرسال الطلب باستخدام Ajax
            $.ajax({
                type: 'POST',
                url: 'request_content.php', // نفس الملف
                data: {
                    action: action,
                    applicationID: applicationID
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response); // لعرض الاستجابة في الكونسول
                    if (response.status === 'success') {
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('حدث خطأ أثناء المعالجة:', error);
                    alert('حدث خطأ أثناء معالجة الطلب.');
                }
            });
            location.reload();
        });
    });
</script>