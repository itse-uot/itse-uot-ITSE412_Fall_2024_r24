<?php
include '../execute/dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

// استعلام لجلب الفعاليات من قاعدة البيانات
$query = "
    SELECT 
        e.EventID, 
        e.EventName, 
        e.Description, 
        e.Location, 
        e.StartDate, 
        e.EndDate, 
        e.RequiredSkills, 
        e.Image, 
        e.OrganizationID, 
        o.OrganizationName, 
        o.OrganizationPicture,  -- إضافة صورة المنظمة
        COALESCE(AVG(r.Rating), 0) AS AverageRating, 
        COUNT(r.ReviewID) AS TotalRatings 
    FROM events e
    LEFT JOIN organizations o ON e.OrganizationID = o.OrganizationID
    LEFT JOIN ratingsandreviews r ON e.EventID = r.EventID
    GROUP BY e.EventID
";

try {
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $events = $stmt->fetchAll(PDO::FETCH_ASSOC); // استرجاع البيانات
} catch (PDOException $e) {
  die("خطأ في جلب البيانات: " . $e->getMessage());
}
?>

<div class="container">
  <div class="row">
    <!-- العمود الرئيسي للبطاقات -->
    <div class="col-md-12">
      <div class="row">
        <?php foreach ($events as $event): ?>
          <!-- البطاقة الخاصة بالفعالية -->
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <!-- الجزء العلوي من البطاقة -->
              <div class="d-flex align-items-center justify-content-between p-3">
                <!-- الجزء الأيسر: صورة المنظمة واسمها -->
                <div class="d-flex align-items-center">
                  <?php
                  // معالجة صورة المنظمة
                  $orgImageData = !empty($event['OrganizationPicture']) ? $event['OrganizationPicture'] : null;
                  if ($orgImageData) {
                    // تحويل BLOB إلى Base64
                    $orgImagePath = 'data:image/jpeg;base64,' . base64_encode($orgImageData);
                  } else {
                    // استخدام صورة افتراضية إذا لم تكن هناك صورة
                    $orgImagePath = 'assets/img/default-org.jpg';
                  }
                  ?>
                  <img src="<?= $orgImagePath ?>" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                  <div>
                    <h6 class="m-0"><?= htmlspecialchars($event['OrganizationName']) ?></h6>
                    <small class="text-muted"><?= htmlspecialchars($event['StartDate']) ?></small>
                  </div>
                </div>

                <!-- زر الخيارات على اليمين -->
                <?php if (isset($_SESSION['org']) && $_SESSION['org'] == $event['OrganizationID']): ?>
                  <div class="dropdown">
                    <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical"></i> <!-- أيقونة ثلاث نقاط عمودية -->
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item edit-event" href="#" data-bs-toggle="modal" data-bs-target="#editEventModal" data-event-id="<?= $event['EventID'] ?>">
                          تعديل
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item delete-event" href="#" data-event-id="<?= $event['EventID'] ?>">
                          حذف
                        </a>
                      </li>
                    </ul>
                  </div>
                <?php endif; ?>
              </div>

              <!-- عرض صورة الفعالية -->
              <?php
              $imageData = !empty($event['Image']) ? $event['Image'] : null;
              if ($imageData) {
                $imageInfo = getimagesizefromstring($imageData);
                if ($imageInfo) {
                  $imagePath = 'data:' . $imageInfo['mime'] . ';base64,' . base64_encode($imageData);
                } else {
                  $imagePath = 'assets/img/default-event.jpg';
                }
              } else {
                $imagePath = 'assets/img/voluntee.jpeg';
              }
              ?>
              <img src="<?= $imagePath ?>" class="card-img-top" alt="Event Image" style="height: 200px; object-fit: cover;">

              <!-- باقي محتوى البطاقة -->
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($event['EventName']) ?></h5>
                <p class="card-text mb-1"><strong>الوصف:</strong> <?= htmlspecialchars($event['Description']) ?></p>
                <p class="card-text mb-1"><strong>الموقع:</strong> <?= htmlspecialchars($event['Location']) ?></p>
                <p class="card-text mb-1"><strong>التاريخ البداية:</strong> <?= htmlspecialchars($event['StartDate']) ?></p>
                <p class="card-text mb-1"><strong>التاريخ النهاية:</strong> <?= htmlspecialchars($event['EndDate']) ?></p>
                <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> <?= htmlspecialchars($event['RequiredSkills']) ?></p>

                <!-- عرض التقييم الإجمالي -->
                <div class="mt-4">
                  <h6>التقييم الإجمالي:</h6>
                  <div class="d-flex align-items-center">
                    <span class="text-warning fs-5 me-2" id="averageRatingStars">
                      <?php
                      $rating = round($event['AverageRating']);
                      for ($i = 1; $i <= 5; $i++) {
                        echo $i <= $rating ? '★' : '☆';
                      }
                      ?>
                    </span>
                    <strong id="averageRatingValue">(<?= number_format($event['AverageRating'], 1) ?>)</strong>
                  </div>
                  <p class="text-muted" id="totalRatingsCount">عدد التقييمات: <?= htmlspecialchars($event['TotalRatings']) ?></p>
                </div>

                <!-- زر عرض التقييمات -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                  <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal<?= $event['EventID'] ?>">
                    <i class="bi bi-chat-left-text"></i> عرض التقييمات
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal لعرض التقييمات -->
          <div class="modal fade" id="reviewModal<?= $event['EventID'] ?>" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reviewModalLabel">عرض التقييمات</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- عرض التقييمات السابقة -->
                  <div id="previousReviews">
                    <?php
                    $eventID = $event['EventID'];
                    $query = "
                            SELECT 
                                r.Rating, 
                                r.ReviewText, 
                                u.FullName, 
                                r.CreatedAt 
                            FROM ratingsandreviews r
                            LEFT JOIN users u ON r.UserID = u.UserID
                            WHERE r.EventID = :eventID
                            ORDER BY r.CreatedAt DESC
                        ";
                    try {
                      $stmt = $conn->prepare($query);
                      $stmt->bindParam(':eventID', $eventID, PDO::PARAM_INT);
                      $stmt->execute();
                      $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                      die("خطأ في جلب البيانات: " . $e->getMessage());
                    }

                    if (count($reviews) > 0) {
                      foreach ($reviews as $review) {
                        $rating = round($review['Rating']);
                        echo '
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="assets/img/prof.jpeg" alt="User Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                                <div>
                                                    <h6 class="m-0">' . htmlspecialchars($review['FullName']) . '</h6>
                                                    <small class="text-muted">' . htmlspecialchars($review['CreatedAt']) . '</small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="text-warning fs-5 me-2">
                                                    ';
                        for ($i = 1; $i <= 5; $i++) {
                          echo $i <= $rating ? '★' : '☆';
                        }
                        echo '
                                                </span>
                                                <strong>(' . number_format($review['Rating'], 1) . ')</strong>
                                            </div>
                                            <p class="card-text">' . htmlspecialchars($review['ReviewText']) . '</p>
                                        </div>
                                    </div>
                                ';
                      }
                    } else {
                      echo '<p class="text-muted text-center">لا توجد تقييمات حتى الآن.</p>';
                    }
                    ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php include 'edit_event_modal.php'; ?>
<script src="../assets/js/event_actions.js"></script>