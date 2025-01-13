<div class="container">
  <div class="row">
    <!-- العمود الرئيسي للبطاقات -->
    <div class="col-md-9 order-md-1">
      <!-- البطاقة الأولى -->
      <div class="card mb-4">
        <div class="d-flex align-items-center p-3">
          <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3"
            style="width: 50px; height: 50px;">
          <div>
            <h6 class="m-0">منظمة السلام الأخضر</h6>
            <small class="text-muted">25 ديسمبر 2024</small>
          </div>
        </div>
        <img src="assets/img/voluntee.jpeg" class="card-img-top" alt="Event Image">
        <div class="card-body">
          <h5 class="card-title">فعالية اليوم المفتوح</h5>
          <p class="card-text mb-1"><strong>الوصف:</strong> يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة.</p>
          <p class="card-text mb-1"><strong>الموقع:</strong> المدينة الجامعية</p>
          <p class="card-text mb-1"><strong>التاريخ البداية:</strong> 25 ديسمبر 2024</p>
          <p class="card-text mb-1"><strong>التاريخ النهاية:</strong> 30 ديسمبر 2024</p>
          <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> التواصل، التنظيم، الإدارة</p>

          <!-- عرض التقييم الإجمالي -->
          <div class="mt-4">
            <h6>التقييم الإجمالي:</h6>
            <div class="d-flex align-items-center">
              <span class="text-warning fs-5 me-2" id="averageRatingStars">
                ★★★★☆
              </span>
              <strong id="averageRatingValue">(4.2)</strong>
            </div>
            <p class="text-muted" id="totalRatingsCount">عدد التقييمات: 5</p>
          </div>

          <div class="d-flex justify-content-between align-items-center mt-3">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">إضافة
              تقييم</button>
            <?php
            include "evaluation_content.php";
            ?>
            
            <button class="btn btn-outline-secondary btn-sm">تقديم طلب</button>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>