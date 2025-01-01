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
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">عرض
                التقيمات</button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <!-- Modal لعرض التقييمات فقط -->
  <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reviewModalLabel">التقييمات</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- عرض التقييمات السابقة -->
          <div class="mb-4">
            <h6>التقييمات السابقة:</h6>
            <div id="previousReviews">
              <div class="mb-3 d-flex align-items-start">
                <span class="text-warning fs-5 me-2">★★★★★</span>
                <div>
                  <strong>محمد أحمد</strong>
                  <p class="text-muted mb-0">فعالية رائعة! التنظيم كان ممتازًا.</p>
                </div>
              </div>
              <div class="mb-3 d-flex align-items-start">
                <span class="text-warning fs-5 me-2">★★★★☆</span>
                <div>
                  <strong>سارة علي</strong>
                  <p class="text-muted mb-0">أنشطة ممتعة ولكن المكان كان مزدحمًا بعض الشيء.</p>
                </div>
              </div>
              <div class="mb-3 d-flex align-items-start">
                <span class="text-warning fs-5 me-2">★★★☆☆</span>
                <div>
                  <strong>أحمد سالم</strong>
                  <p class="text-muted mb-0">تجربة متوسطة، يمكن تحسين التنظيم.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>