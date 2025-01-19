<?php
include '../execute/dbconfig.php';


// التحقق من الجلسة ومعرف المنظمة
if (!isset($_SESSION['org'])) {
    die("خطأ: لم يتم العثور على بيانات المنظمة.");
}

$orgID = $_SESSION['org'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $applicationID = $_POST['applicationID'] ?? null;

    if (!$applicationID) {
        echo json_encode(['status' => 'error', 'message' => 'رقم الطلب غير موجود.']);
        exit;
    }

    try {
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
        echo json_encode(['status' => 'error', 'message' => 'حدث خطأ أثناء معالجة الطلب.']);
    }
    exit;
}

// جلب الطلبات من قاعدة البيانات
$pendingRequestsQuery = "SELECT applications.ApplicationID, applications.ApplicationStatus, 
                                volunteers.FullName, volunteers.ContactEmail, volunteers.ContactNumber, volunteers.ProfilePicture,
                                events.EventName, events.Location, applications.CreatedAt 
                         FROM applications 
                         INNER JOIN volunteers ON applications.VolunteerID = volunteers.VolunteerID 
                         INNER JOIN events ON applications.EventID = events.EventID 
                         WHERE applications.ApplicationStatus = 'Pending' AND events.OrganizationID = :orgID";

$acceptedRequestsQuery = "SELECT applications.ApplicationID, applications.ApplicationStatus, 
                                  volunteers.FullName, volunteers.ContactEmail, volunteers.ContactNumber, volunteers.ProfilePicture,
                                  events.EventName, events.Location, applications.CreatedAt 
                           FROM applications 
                           INNER JOIN volunteers ON applications.VolunteerID = volunteers.VolunteerID 
                           INNER JOIN events ON applications.EventID = events.EventID 
                           WHERE applications.ApplicationStatus = 'Accepted' AND events.OrganizationID = :orgID";

try {
    $stmt = $conn->prepare($pendingRequestsQuery);
    $stmt->execute([':orgID' => $orgID]);
    $pendingRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare($acceptedRequestsQuery);
    $stmt->execute([':orgID' => $orgID]);
    $acceptedRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                            <small><?= $request['ContactEmail'] ?></small>
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
                        <?php foreach ($acceptedRequests as $request): ?>
                            <div class="card w-100 mb-3 py-2">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $request['EventName'] ?></h5>
                                    <p><?= $request['Location'] ?></p>
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
                                            <tr>
                                                <td><?= $request['FullName'] ?></td>
                                                <td><?= $request['ContactNumber'] ?></td>
                                                <td><?= $request['ContactEmail'] ?></td>
                                                <td><?= $request['CreatedAt'] ?></td>
                                            </tr>
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
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('accept-btn') || e.target.classList.contains('reject-btn')) {
        const applicationID = e.target.getAttribute('data-id');
        const action = e.target.classList.contains('accept-btn') ? 'accept' : 'reject';

        fetch('', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=${action}&applicationID=${applicationID}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => alert('حدث خطأ أثناء المعالجة.'));
    }
});
</script>
