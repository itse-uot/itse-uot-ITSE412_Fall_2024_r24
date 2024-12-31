<!DOCTYPE html>

<?php
  include "head.php";

?>


<body>

<?php
 include "header.php";
 include "sidebar.php";
?>
<main id="main" class="main">
  <h1>وظيفة المتطوعين</h1>
  <div class="pagetitle">
    <h1>الملف الشخصي</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>الاسم</h2>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- معلومات الملف الشخصي -->
            <h5 class="card-title">تفاصيل الملف الشخصي</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">الاسم الكامل</div>
              <div class="col-lg-9 col-md-8">احمد الشريف</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
              <div class="col-lg-9 col-md-8">092-00000000</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
              <div class="col-lg-9 col-md-8">k.anderson@gamil.com</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">المهارات</div>
              <div class="col-lg-9 col-md-8">مهارات التواصل، إدارة الوقت</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- قسم البطاقات -->
  <div class="container">
    <div class="row">
      <!-- تكرار البطاقات مع عرض 620px -->
      <div class="col-12">
        <div class="card mb-4" style="max-width: 620px; margin: auto;"> <!-- ضبط العرض إلى 620px -->
          <!-- رأس البطاقة -->
          <div class="d-flex align-items-center p-2">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;"> <!-- حجم الصورة -->
            <div>
              <h6 class="m-0">منظمة السلام الأخضر</h6>
              <small class="text-muted">25 ديسمبر 2024</small>
            </div>
          </div>
          <img src="assets/img/voluntee.jpeg" class="card-img-top" alt="Event Image" style="height: 220px; object-fit: cover;"> <!-- ضبط ارتفاع الصورة -->
          <!-- محتوى البطاقة -->
          <div class="card-body">
            <h5 class="card-title">فعالية اليوم المفتوح</h5>
            <p class="card-text mb-1"><strong>الوصف:</strong> يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة.</p>
            <p class="card-text text-success"><strong>لقد انضم لهذه الفعالية كمتطوع.</strong></p>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card mb-4" style="max-width: 620px; margin: auto;"> <!-- ضبط العرض إلى 620px -->
          <!-- رأس البطاقة -->
          <div class="d-flex align-items-center p-2">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;"> <!-- حجم الصورة -->
            <div>
              <h6 class="m-0">منظمة السلام الأخضر</h6>
              <small class="text-muted">25 ديسمبر 2024</small>
            </div>
          </div>
          <img src="assets/img/voluntee.jpeg" class="card-img-top" alt="Event Image" style="height: 220px; object-fit: cover;"> <!-- ضبط ارتفاع الصورة -->
          <!-- محتوى البطاقة -->
          <div class="card-body">
            <h5 class="card-title">فعالية اليوم المفتوح</h5>
            <p class="card-text mb-1"><strong>الوصف:</strong> يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة.</p>
            <p class="card-text text-success"><strong>لقد انضم لهذه الفعالية كمتطوع.</strong></p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</main>

<?php
 include "footer.php";
 include "tail.php";
 ?>


</body>

</html>