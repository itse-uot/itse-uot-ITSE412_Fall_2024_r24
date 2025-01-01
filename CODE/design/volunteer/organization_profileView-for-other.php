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
    <div class="pagetitle">
      <h1>الملف الشخصي للمنظمة</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle">
              <h2>منظمة الأمل الخيرية</h2> <!-- اسم المنظمة -->
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-8">
          <div class="card p-4">
            <div class="tab-pane fade show active" id="profile-overview">
              <h5 class="card-title text-center mb-3">تفاصيل المنظمة</h5>

              <div class="row mb-3">
                <div class="col-4 label">اسم المنظمة</div>
                <div class="col-8">منظمة الأمل الخيرية</div>
              </div>

              <div class="row mb-3">
                <div class="col-4 label">البريد الإلكتروني</div>
                <div class="col-8">info@alamal.org</div>
              </div>

              <div class="row mb-3">
                <div class="col-4 label">رقم الهاتف</div>
                <div class="col-8">092-12345678</div>
              </div>

              <div class="row mb-3">
                <div class="col-4 label">المجال</div>
                <div class="col-8">الرعاية الصحية</div>
              </div>

              <div class="row mb-3">
                <div class="col-4 label">الموقع</div>
                <div class="col-8">شارع الأمل، طرابلس، ليبيا</div>
              </div>

              <div class="row mb-3">
                <div class="col-4 label">الوصف</div>
                <div class="col-8">منظمة خيرية تعمل على تقديم الرعاية الصحية للأسر المحتاجة في ليبيا.</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- قسم الفعاليات -->
    <div class="container">
      <div class="pagetitle mt-5">
        <h2>الفعاليات الخاصة بالمنظمة</h2>
      </div>
      <div class="row">
        <!-- الفعالية الأولى -->
        <div class="col-12">
          <div class="card mb-4" style="max-width: 620px; margin: auto;">
            <div class="d-flex align-items-center p-2">
              <img src="assets/img/prof.jpeg" alt="Event Image" class="rounded-circle me-3"
                style="width: 50px; height: 50px;">
              <div>
                <h6 class="m-0">حملة التبرع بالدم</h6>
                <small class="text-muted">تاريخ: 2023-09-20</small>
              </div>
            </div>
            <img src="assets/img/Turkey __ ig_ @withahsen.jpeg" class="card-img-top" alt="Event Image"
              style="height: 220px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">تفاصيل الفعالية</h5>
              <p class="card-text mb-1"><strong>الوصف:</strong> حملة تهدف إلى جمع التبرعات بالدم لصالح المستشفيات
                المحلية.</p>
              <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> التنظيم، التواصل.</p>
            </div>
          </div>
        </div>

        <!-- الفعالية الثانية -->
        <div class="col-12">
          <div class="card mb-4" style="max-width: 620px; margin: auto;">
            <div class="d-flex align-items-center p-2">
              <img src="assets/img/prof.jpeg" alt="Event Image" class="rounded-circle me-3"
                style="width: 50px; height: 50px;">
              <div>
                <h6 class="m-0">توزيع المساعدات الغذائية</h6>
                <small class="text-muted">تاريخ: 2023-08-15</small>
              </div>
            </div>
            <img src="assets/img/Turkey __ ig_ @withahsen.jpeg" class="card-img-top" alt="Event Image"
              style="height: 220px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">تفاصيل الفعالية</h5>
              <p class="card-text mb-1"><strong>الوصف:</strong> توزيع سلال غذائية على الأسر المحتاجة في طرابلس وضواحيها.
              </p>
              <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> التخطيط، القيادة.</p>
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