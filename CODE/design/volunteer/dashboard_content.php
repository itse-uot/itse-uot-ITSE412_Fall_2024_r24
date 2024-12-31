<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">


          <!-- Reports -->
          <div class="col-12"><!-- -من هنا-->
            <div class="card">
            <div class="d-flex align-items-center p-2">
          <img src="anythislink/personal.jpg" alt="Organization Logo" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
          <h6 class="m-0">منظمة السلام الأخضر</h6>
        </div>

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body">
  <h5 class="card-title" style="font-weight: bold; color: #333;">تفاصيل الفعالية</h5>

  <!-- تفاصيل الفعالية -->
  <div class="event-details">
    <img src="anythislink/event.jpg" alt="صورة الفعالية" style="width: 100%; height: auto; border-radius: 6px; margin-bottom: 15px; border: 1px solid #ddd;">
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

  <!-- قسم التقييمات السابقة -->
  <div class="previous-reviews mt-4">
    <h5 style="font-weight: bold; color: #333;">التقييمات السابقة</h5>
    <div class="review" style="border-bottom: 1px solid #ddd; padding: 10px 0;">
      <p><span style="font-weight: bold;">محمد أحمد</span> - <span style="font-size: 14px; color: #ffc107;">⭐⭐⭐⭐⭐</span></p>
      <p style="color: #555;">فعالية رائعة! التنظيم كان ممتازًا.</p>
    </div>
    <div class="review" style="border-bottom: 1px solid #ddd; padding: 10px 0;">
      <p><span style="font-weight: bold;">سارة علي</span> - <span style="font-size: 14px; color: #ffc107;">⭐⭐⭐⭐</span></p>
      <p style="color: #555;">أنشطة ممتعة ولكن المكان كان مزدحمًا بعض الشيء.</p>
    </div>
    <div class="review" style="padding: 10px 0;">
      <p><span style="font-weight: bold;">أحمد سالم</span> - <span style="font-size: 14px; color: #ffc107;">⭐⭐⭐</span></p>
      <p style="color: #555;">تجربة متوسطة، يمكن تحسين التنظيم.</p>
    </div>
  </div>
</div>


<div class="d-flex flex-wrap gap-3 justify-content-start">
      <!-- بداية الكارد -->
      <div class="card" style="width: 18rem; flex: 0 1 calc(33.333% - 1rem);">
        <div class="d-flex align-items-center p-2">
          <img src="anythislink/personal.jpg" alt="Organization Logo" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
          <h6 class="m-0">منظمة السلام الأخضر</h6>
        </div>

        <img src="anythislink/event.jpg" class="card-img-top" alt="Card Image">
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold; color: #333;">تفاصيل الفعالية</h5>
          <div class="event-details">
            <h6>اسم الفعالية: <span style="font-weight: bold; color: #000;">فعالية اليوم المفتوح</span></h6>
            <p>الوصف: <span style="color: #555;">يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة</span></p>
            <p>الموقع: <span style="color: #555;">المدينة الجامعية</span></p>
            <p>التاريخ والوقت: <span style="color: #555;">25 ديسمبر 2024، الساعة 9:00 صباحًا</span></p>
          </div>
          <div class="event-actions mt-4" style="display: flex; gap: 10px;">
            <button class="btn btn-outline-primary btn-classic" onclick="applyToEvent()">تقديم طلب للمشاركة</button>
          </div>
        </div>
      </div>
<section>
</main><!-- End #main -->


<style>
  /* تصميم كلاسيكي بسيط */
  .rating-stars .star {
    cursor: pointer;
    font-size: 24px;
    color: #ccc;
    transition: color 0.3s;
  }

  .rating-stars .star.selected {
    color: #ffc107;
  }
</style>

<script>
  // لإظهار نافذة التقييم
  function openReviewModal() {
    document.getElementById('eventReviewModal').style.display = 'flex';
  }

  // لإغلاق نافذة التقييم
  function closeReviewModal() {
    document.getElementById('eventReviewModal').style.display = 'none';
  }

  // للتفاعل مع نظام النجوم
  const stars = document.querySelectorAll('.rating-stars .star');
  const ratingDisplay = document.getElementById('selected-rating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      stars.forEach((s, i) => {
        s.classList.toggle('selected', i <= index);
      });
      ratingDisplay.textContent = `عدد النجوم المختارة: ${index + 1}`;
    });
  });

  // إرسال التقييم
  function submitReview() {
    const selectedStars = document.querySelectorAll('.rating-stars .star.selected').length;
    alert(`تم إرسال التقييم بنجاح بعدد النجوم: ${selectedStars}`);
    closeReviewModal();
  }

  // تقديم طلب
  function applyToEvent() {
    alert('تم إرسال طلب المشاركة بنجاح!');
  }
</script>

</main><!-- End #main -->
