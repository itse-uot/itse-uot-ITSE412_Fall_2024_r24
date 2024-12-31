<main id="main" class="main">
  <div class="container">
    <div class="row">
      <!-- العمود الرئيسي للبطاقات -->
      <div class="col-md-9 order-md-1">
        <!-- البطاقة الأولى -->
        <div class="card mb-4">
          <div class="d-flex align-items-center p-3">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;">
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
            <p class="card-text mb-1"><strong>التاريخ:</strong> 25 ديسمبر 2024</p>
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
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">إضافة تقييم</button>
              <button class="btn btn-outline-secondary btn-sm">تقديم طلب</button>
            </div>
          </div>
        </div>
      </div>

      <!-- العمود الجانبي للملف الشخصي -->
      <div class="col-md-3 order-md-2">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle mb-3" style="width: 80px; height: 80px;">
            <h5 class="card-title">Hasan AbouMinyar</h5>
            <p class="card-text text-muted">Student at University of Tripoli</p>
            <button class="btn btn-primary btn-sm">+ Experience</button>
          </div>
        </div>
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
          <!-- نموذج التقييم -->
          <form id="reviewForm">
            <div class="mb-3">
              <label for="ratingStars" class="form-label">التقييم:</label>
              <div id="ratingStars" class="d-flex gap-2">
                <i class="bi bi-star fs-4" data-value="1"></i>
                <i class="bi bi-star fs-4" data-value="2"></i>
                <i class="bi bi-star fs-4" data-value="3"></i>
                <i class="bi bi-star fs-4" data-value="4"></i>
                <i class="bi bi-star fs-4" data-value="5"></i>
              </div>
              <div class="card-body">
  <h5 class="card-title" style="font-weight: bold; color: #333;">تفاصيل الفعالية</h5>

  <!-- تفاصيل الفعالية -->
  <div class="event-details">
    <img src="assets/img/Turkey__ig_@withahsen.jpeg" alt="صورة الفعالية" style="width: 100%; height: auto; border-radius: 6px; margin-bottom: 15px; border: 1px solid #ddd;">
    <h6>اسم الفعالية: <span style="font-weight: bold; color: #000;">فعالية اليوم المفتوح</span></h6>
    <p>الوصف: <span style="color: #555;">يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة</span></p>
    <p>الموقع: <span style="color: #555;">المدينة الجامعية</span></p>
    <p>التاريخ والوقت: <span style="color: #555;">25 ديسمبر 2024، الساعة 9:00 صباحًا</span></p>
    <p>عدد المشاركين الحالي: <span style="color: #555;">45</span></p>
    <p>المهارات المطلوبة: <span style="color: #555;">التواصل، التنظيم، والإدارة</span></p>
    <p>التقييم الإجمالي: 
      <span class="rating-stars-total" style="font-size: 18px; color: #ffc107;">⭐⭐⭐⭐☆</span> 
      <span style="color: #555;">(4.0)</span>
    </p>
  </div>

  <!-- الأزرار -->
  <div class="event-actions mt-4" style="display: flex; gap: 10px;">
    <button class="btn btn-outline-primary btn-classic" onclick="applyToEvent()">تقديم طلب للمشاركة</button>
    <button class="btn btn-outline-secondary btn-classic" onclick="openReviewModal()">تقييم الفعالية</button>
  </div>

  <!-- نموذج التقييم (يظهر عند النقر على زر تقييم الفعالية) -->
  <div id="eventReviewModal" style="display: none; background: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; align-items: center; justify-content: center;">
    <div style="background: #fff; padding: 20px; border-radius: 8px; max-width: 400px; text-align: center; border: 1px solid #ddd;">
      <h5 style="color: #333; font-weight: bold;">تقييم الفعالية</h5>
      <div class="rating-stars" style="margin: 15px 0; display: flex; justify-content: center; gap: 8px; font-size: 24px;">
        <span class="star" data-value="1">☆</span>
        <span class="star" data-value="2">☆</span>
        <span class="star" data-value="3">☆</span>
        <span class="star" data-value="4">☆</span>
        <span class="star" data-value="5">☆</span>
      </div>
      <p id="selected-rating" style="color: #555; font-size: 14px;">عدد النجوم المختارة: 0</p>
      <textarea class="form-control mt-3" rows="3" placeholder="اكتب تعليقك هنا..." style="resize: none; border: 1px solid #ccc; border-radius: 5px; padding: 8px; font-size: 14px;"></textarea>
      <div class="mt-3" style="display: flex; justify-content: space-around;">
        <button class="btn btn-primary btn-classic" onclick="submitReview()">إرسال</button>
        <button class="btn btn-secondary btn-classic" onclick="closeReviewModal()">إغلاق</button>
      </div>
    </div>
  </div>
</main>

<script>
  // التفاعل مع النجوم للتقييم
  const stars = document.querySelectorAll('#ratingStars .bi-star');
  const ratingValueInput = document.getElementById('ratingValue');
  const averageRatingStars = document.getElementById('averageRatingStars');
  const averageRatingValue = document.getElementById('averageRatingValue');
  const totalRatingsCount = document.getElementById('totalRatingsCount');
  let totalRatings = 5; // عدد التقييمات الحالية
  let ratingSum = 21; // مجموع تقييمات المستخدمين

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      stars.forEach((s, i) => {
        if (i <= index) {
          s.classList.remove('bi-star');
          s.classList.add('bi-star-fill');
        } else {
          s.classList.remove('bi-star-fill');
          s.classList.add('bi-star');
        }
      });
      ratingValueInput.value = index + 1;
    });
  });

  // معالجة إرسال التقييم
  document.getElementById('reviewForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const rating = parseInt(ratingValueInput.value);
    const description = document.getElementById('reviewDescription').value;

    if (rating > 0 && description.trim() !== "") {
      // تحديث التقييم الإجمالي
      totalRatings += 1;
      ratingSum += rating;
      const averageRating = (ratingSum / totalRatings).toFixed(1);
      averageRatingStars.textContent = '★'.repeat(Math.floor(averageRating)) + '☆'.repeat(5 - Math.floor(averageRating));
      averageRatingValue.textContent = `(${averageRating})`;
      totalRatingsCount.textContent = `عدد التقييمات: ${totalRatings}`;

      // إضافة التقييم الجديد إلى القائمة
      const newReview = `
        <div class="mb-3 d-flex align-items-start">
          <span class="text-warning fs-5 me-2">${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</span>
          <div>
            <strong>تقييم جديد</strong>
            <p class="text-muted mb-0">${description}</p>
          </div>
        </div>`;
      document.getElementById('previousReviews').insertAdjacentHTML('beforeend', newReview);

      alert(`تم إرسال التقييم بنجاح!\nالتقييم: ${rating} نجوم\nالوصف: ${description}`);
      document.getElementById('reviewForm').reset();
      stars.forEach(star => {
        star.classList.remove('bi-star-fill');
        star.classList.add('bi-star');
      });
      ratingValueInput.value = 0;
    } else {
      alert('يرجى اختيار عدد النجوم وإضافة وصف.');
    }
  });
</script>
