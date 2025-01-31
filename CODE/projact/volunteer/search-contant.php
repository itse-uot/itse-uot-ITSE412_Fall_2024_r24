<?php
include('../execute/dbconfig.php'); // الاتصال بقاعدة البيانات

// التحقق من استلام كلمة البحث عبر GET أو POST
$query = isset($_GET['query']) ? $_GET['query'] : ''; // استخدام GET بدلاً من POST

if ($query !== '') {
    // البحث في قاعدة البيانات عن المتطوعين
    $stmt = $conn->prepare("SELECT * FROM volunteers WHERE FullName LIKE :query");
    $stmt->execute(['query' => '%' . $query . '%']);
    $volunteers = $stmt->fetchAll();

    // البحث في قاعدة البيانات عن المنظمات
    $stmt = $conn->prepare("SELECT * FROM organizations WHERE OrganizationName LIKE :query");
    $stmt->execute(['query' => '%' . $query . '%']);
    $organizations = $stmt->fetchAll();

    // البحث في قاعدة البيانات عن الفعاليات
    $stmt = $conn->prepare("SELECT * FROM events WHERE EventName LIKE :query");
    $stmt->execute(['query' => '%' . $query . '%']);
    $events = $stmt->fetchAll();
}
?>

<main id="main" class="main">
  <h1>البحث</h1>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">نتائج البحث</h5>

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#volunteer_s" type="button" role="tab" aria-controls="home" aria-selected="true">المتطوعين</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#organization_s" type="button" role="tab" aria-controls="profile" aria-selected="false">المنظمات</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#event_s" type="button" role="tab" aria-controls="contact" aria-selected="false">الفعاليات</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="borderedTabContent">
        <!-- المتطوعين -->
        <div class="tab-pane fade show active" id="volunteer_s" role="tabpanel" aria-labelledby="home-tab">
          <div id="volunteerResults" class="mt-4">
            <!-- نتائج البحث عن المتطوعين ستظهر هنا -->
            <?php if (isset($volunteers) && !empty($volunteers)): ?>
              <?php foreach ($volunteers as $volunteer): ?>
                <div class="card w-100 mb-3">
                  <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                      <img src="<?= isset($volunteer['ProfilePicture']) ? $volunteer['ProfilePicture'] : 'default-profile.png'; ?>" alt="Volunteer Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                      <div>
                        <h5 class="card-title mb-0">
                          <a href="volunteer_profileView-for-other.php?id=<?= isset($volunteer['VolunteerID']) ? $volunteer['VolunteerID'] : ''; ?>" class="text-decoration-none text-dark"><?= isset($volunteer['FullName']) ? $volunteer['FullName'] : 'غير متوفر'; ?></a>
                        </h5>
                        <p class="mb-0 text-muted">البريد الإلكتروني: <?= isset($volunteer['ContactEmail']) ? $volunteer['ContactEmail'] : 'غير متوفر'; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>لا توجد نتائج للبحث عن المتطوعين.</p>
            <?php endif; ?>
          </div>
        </div>

        <!-- المنظمات -->
        <div class="tab-pane fade" id="organization_s" role="tabpanel" aria-labelledby="profile-tab">
          <div id="organizationResults" class="mt-4">
            <!-- نتائج البحث عن المنظمات ستظهر هنا -->
            <?php if (isset($organizations) && !empty($organizations)): ?>
              <?php foreach ($organizations as $org): ?>
                <div class="card w-100 mb-3">
                  <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                      <img src="<?= isset($org['Logo']) ? $org['Logo'] : 'default-logo.png'; ?>" alt="Organization Logo" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                      <div>
                        <h5 class="card-title mb-0">
                          <a href="organization_profileView-for-other.php?id=<?= isset($org['OrganizationID']) ? $org['OrganizationID'] : ''; ?>" class="text-decoration-none text-dark"><?= isset($org['OrganizationName']) ? $org['OrganizationName'] : 'غير متوفر'; ?></a>
                        </h5>
                        <p class="mb-0 text-muted">المجال: <?= isset($org['Sector']) ? $org['Sector'] : 'غير متوفر'; ?></p>
                        <p class="mb-0 text-muted">الموقع: <?= isset($org['Address']) ? $org['Address'] : 'غير متوفر'; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>لا توجد نتائج للبحث عن المنظمات.</p>
            <?php endif; ?>
          </div>
        </div>

        <!-- الفعاليات -->
        <div class="tab-pane fade" id="event_s" role="tabpanel" aria-labelledby="contact-tab">
          <div id="eventResults" class="mt-4">
            <!-- نتائج البحث عن الفعاليات ستظهر هنا -->
            <?php if (isset($events) && !empty($events)): ?>
              <?php foreach ($events as $event): ?>
                <div class="card mb-4">
                  <div class="d-flex align-items-center p-3">
                    <img src="<?= isset($event['OrganizationLogo']) ? $event['OrganizationLogo'] : 'default-logo.png'; ?>" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                    <div>
                      <h6 class="m-0"><?= isset($event['OrganizationName']) ? $event['OrganizationName'] : 'غير متوفر'; ?></h6>
                      <small class="text-muted"><?= isset($event['StartDate']) ? $event['StartDate'] : 'غير متوفر'; ?></small>
                    </div>
                  </div>
                  <img src="<?= isset($event['Image']) ? $event['Image'] : 'default-event.png'; ?>" class="card-img-top" alt="Event Image">
                  <div class="card-body">
                    <h5 class="card-title"><?= isset($event['EventName']) ? $event['EventName'] : 'غير متوفر'; ?></h5>
                    <p class="card-text mb-1"><strong>الوصف:</strong> <?= isset($event['Description']) ? $event['Description'] : 'غير متوفر'; ?></p>
                    <p class="card-text mb-1"><strong>الموقع:</strong> <?= isset($event['Location']) ? $event['Location'] : 'غير متوفر'; ?></p>
                    <p class="card-text mb-1"><strong>التاريخ البداية:</strong> <?= isset($event['StartDate']) ? $event['StartDate'] : 'غير متوفر'; ?></p>
                    <p class="card-text mb-1"><strong>التاريخ النهاية:</strong> <?= isset($event['EndDate']) ? $event['EndDate'] : 'غير متوفر'; ?></p>
                    <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> <?= isset($event['RequiredSkills']) ? $event['RequiredSkills'] : 'غير متوفر'; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>لا توجد نتائج للبحث عن الفعاليات.</p>
            <?php endif; ?>
          </div>
        </div>
      </div><!-- End Bordered Tabs -->
    </div>
  </div>
</main>
