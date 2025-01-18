<?php
// الاتصال بقاعدة البيانات
require_once 'dbconfig.php';

// الحصول على قيمة البحث من POST
$query = isset($_POST['query']) ? $_POST['query'] : '';

// إذا كانت قيمة البحث فارغة، نوقف العملية
if (empty($query)) {
    echo json_encode(['success' => false]);
    exit;
}

// البحث في المتطوعين
$volunteers = [];
$stmt = $conn->prepare("SELECT * FROM volunteers WHERE FullName LIKE :query");
$stmt->execute(['query' => "%$query%"]);
$volunteers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// البحث في المنظمات
$organizations = [];
$stmt = $conn->prepare("SELECT * FROM organizations WHERE OrganizationName LIKE :query");
$stmt->execute(['query' => "%$query%"]);
$organizations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// البحث في الفعاليات
$events = [];
$stmt = $conn->prepare("SELECT * FROM events WHERE EventName LIKE :query");
$stmt->execute(['query' => "%$query%"]);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// تجهيز نتائج المتطوعين بتنسيق HTML
$volunteers_html = '';
foreach ($volunteers as $volunteer) {
    $volunteers_html .= "
    <div class='card w-100'>
      <div class='card-body d-flex align-items-center justify-content-between'>
        <div class='d-flex align-items-center' style='gap: 20px;'>
          <img src='{$volunteer['ProfilePicture']}' alt='Volunteer Profile Picture' class='rounded-circle' style='width: 50px; height: 50px; object-fit: cover;'>
          <div>
            <h5 class='card-title mb-0'>
              <a href='volunteer_profileView-for-other.php?id={$volunteer['id']}' class='text-decoration-none text-dark'>{$volunteer['FullName']}</a>
            </h5>
            <p class='mb-0 text-muted'>البريد الإلكتروني: {$volunteer['ContactEmail']}</p>
          </div>
        </div>
      </div>
    </div>";
}

// تجهيز نتائج المنظمات بتنسيق HTML
$organizations_html = '';
foreach ($organizations as $org) {
    $organizations_html .= "
    <div class='card w-100'>
      <div class='card-body d-flex align-items-center justify-content-between'>
        <div class='d-flex align-items-center' style='gap: 20px;'>
          <img src='{$org['Logo']}' alt='Organization Logo' class='rounded-circle' style='width: 50px; height: 50px; object-fit: cover;'>
          <div>
            <h5 class='card-title mb-0'>
              <a href='organization_profileView-for-other.php?id={$org['id']}' class='text-decoration-none text-dark'>{$org['OrganizationName']}</a>
            </h5>
            <p class='mb-0 text-muted'>المجال: {$org['Sector']}</p>
            <p class='mb-0 text-muted'>الموقع: {$org['Address']}</p>
          </div>
        </div>
      </div>
    </div>";
}

// تجهيز نتائج الفعاليات بتنسيق HTML
$events_html = '';
foreach ($events as $event) {
    $events_html .= "
    <div class='card mb-4'>
      <div class='d-flex align-items-center p-3'>
        <img src='{$event['OrganizationLogo']}' alt='Organization Logo' class='rounded-circle me-3' style='width: 50px; height: 50px;'>
        <div>
          <h6 class='m-0'>{$event['OrganizationName']}</h6>
          <small class='text-muted'>{$event['StartDate']}</small>
        </div>
      </div>
      <img src='{$event['Image']}' class='card-img-top' alt='Event Image'>
      <div class='card-body'>
        <h5 class='card-title'>{$event['EventName']}</h5>
        <p class='card-text mb-1'><strong>الوصف:</strong> {$event['Description']}</p>
        <p class='card-text mb-1'><strong>الموقع:</strong> {$event['Location']}</p>
        <p class='card-text mb-1'><strong>التاريخ البداية:</strong> {$event['StartDate']}</p>
        <p class='card-text mb-1'><strong>التاريخ النهاية:</strong> {$event['EndDate']}</p>
        <p class='card-text mb-1'><strong>المهارات المطلوبة:</strong> {$event['RequiredSkills']}</p>
      </div>
    </div>";
}

// إرسال النتائج على هيئة JSON
echo json_encode([
    'success' => true,
    'volunteers' => $volunteers_html,
    'organizations' => $organizations_html,
    'events' => $events_html
]);
?>
