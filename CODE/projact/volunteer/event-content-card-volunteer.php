<?php
include 'dbconfig.php'; // تضمين ملف الاتصال بقاعدة البيانات

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
        o.OrganizationName, 
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
    <div class="col-md-9 order-md-1">
      <?php foreach ($events as $event): ?>
      <!-- البطاقة الخاصة بالفعالية -->
      <div class="card mb-4">
        <div class="d-flex align-items-center p-3">
          <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3"
            style="width: 50px; height: 50px;">
          <div>
            <h6 class="m-0"><?= htmlspecialchars($event['OrganizationName']) ?></h6>
            <small class="text-muted"><?= htmlspecialchars($event['StartDate']) ?></small>
          </div>
        </div>

        <!-- عرض صورة الفعالية -->
        <?php 
        $imagePath = !empty($event['Image']) ? htmlspecialchars($event['Image']) : 'assets/img/default-event.jpg'; 
        ?>
        <img src="<?= $imagePath ?>" class="card-img-top" alt="Event Image">

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
                // تحويل التقييم إلى نجوم
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

          <!-- أزرار الإجراءات -->
          <div class="d-flex justify-content-between align-items-center mt-3">
            <button 
              class="btn btn-primary btn-sm" 
              data-bs-toggle="modal" 
              data-bs-target="#reviewModal" 
              data-event-id="<?= $event['EventID'] ?>">
              إضافة تقييم
            </button>
            <button 
              class="btn btn-outline-secondary btn-sm" 
              data-event-id="<?= $event['EventID'] ?>">
              تقديم طلب
            </button>
          </div>

          <!-- تضمين ملف التقييم -->
          <?php include "evaluation_content.php"; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Modal لإضافة التقييم -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">إضافة تقييم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- عرض التقييمات السابقة -->
                <div class="mb-4">
                    <h6>التقييمات السابقة:</h6>
                    <div id="previousReviews">
                        <!-- سيتم عرض التقييمات السابقة هنا -->
                    </div>
                </div>
                <!-- نموذج التقييم -->
                <form id="reviewForm">
                    <input type="hidden" id="eventID" name="eventID"> <!-- يتم تعيين القيمة ديناميكيًا -->
                    <div class="mb-3">
                        <label for="ratingStars" class="form-label">التقييم:</label>
                        <div id="ratingStars" class="d-flex gap-2">
                            <i class="bi bi-star fs-4" data-value="1"></i>
                            <i class="bi bi-star fs-4" data-value="2"></i>
                            <i class="bi bi-star fs-4" data-value="3"></i>
                            <i class="bi bi-star fs-4" data-value="4"></i>
                            <i class="bi bi-star fs-4" data-value="5"></i>
                        </div>
                        <input type="hidden" id="ratingValue" name="ratingValue" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="reviewDescription" class="form-label">الوصف:</label>
                        <textarea id="reviewDescription" class="form-control" rows="3" placeholder="اكتب تعليقك هنا..." required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">إرسال</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
