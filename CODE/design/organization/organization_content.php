<main id="main" class="main">
<h1>وظيفه المنظمات</h1>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>وظيفة المنظمة - لوحة التحكم</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center" dir="rtl">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="شعار">
        <span class="d-none d-lg-block">لوحة التحكم</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/img/profile-img.jpg" alt="الملف الشخصي" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">كيفن أندرسون</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>كيفن أندرسون</h6>
              <span>مصمم ويب</span>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="volunteer_profile.php">
                <i class="bi bi-person"></i>
                <span>ملفي الشخصي</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>تسجيل الخروج</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>لوحة التحكم</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="organization.php">
        <i class="bi bi-building"></i>
        <span>وظيفة المنظمات</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="create_event.php">
        <i class="bi bi-calendar"></i>
        <span>إنشاء فعالية</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="view_events.php">
        <i class="bi bi-eye"></i>
        <span>عرض الفعاليات</span>
      </a>
    </li>
    
  </ul>
</aside>

<main id="main" class="main">
  <div class="pagetitle">
    
  </div>

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>اسم المنظمة</h2>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <h5 class="card-title">تفاصيل المنظمة</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">اسم المنظمة</div>
              <div class="col-lg-9 col-md-8">منظمة الأمل الخيرية</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
              <div class="col-lg-9 col-md-8">092-00000000</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">البريد الإلكتروني</div>
              <div class="col-lg-9 col-md-8">info@al-amal.org</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">الموقع</div>
              <div class="col-lg-9 col-md-8">شارع الأمل، المدينة، الدولة</div>
            </div>
            <div class="text-center">
              <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#editProfile">تعديل البيانات</button>
              <button class="btn btn-danger" onclick="confirmDelete()">حذف الحساب</button>
            </div>
            <div class="collapse" id="editProfile">
              <form class="pt-3">
                <div class="row mb-3">
                  <label for="orgName" class="col-md-4 col-lg-3 col-form-label">اسم المنظمة</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="orgName" type="text" class="form-control" id="orgName" value="منظمة الأمل الخيرية">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="phone" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="phone" value="092-00000000">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">البريد الإلكتروني</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="email" value="info@al-amal.org">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="location" class="col-md-4 col-lg-3 col-form-label">الموقع</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="location" type="text" class="form-control" id="location" value="شارع الأمل، المدينة، الدولة">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section recent-events">
    <h2>الفعاليات الأخيرة</h2>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
          <img src="assets/img/event1.jpg" class="card-img-top" alt="فعالية 1">
          <div class="card-body">
            <h5 class="card-title">حفل توزيع المساعدات الغذائية</h5>
            <p class="card-text">تاريخ: 2023-09-15</p>
            <p>التقييم: ⭐⭐⭐⭐☆ (4/5)</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
          <img src="assets/img/event2.jpg" class="card-img-top" alt="فعالية 2">
          <div class="card-body">
            <h5 class="card-title">حملة التبرع بالدم</h5>
            <p class="card-text">تاريخ: 2023-06-20</p>
            <p>التقييم: ⭐⭐⭐⭐⭐ (5/5)</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
          <img src="assets/img/event3.jpg" class="card-img-top" alt="فعالية 3">
          <div class="card-body">
            <h5 class="card-title">ورشة عمل للصحة النفسية</h5>
            <p class="card-text">تاريخ: 2023-03-10</p>
            <p>التقييم: ⭐⭐⭐⭐☆ (4/5)</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<footer id="footer" class="footer">
  <div class="copyright">
    &copy; 2024 جميع الحقوق محفوظة
  </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle sidebar visibility
  document.querySelector('.toggle-sidebar-btn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('toggle');
  });

  // Close sidebar function
  function closeSidebar() {
    document.getElementById('sidebar').classList.add('toggle');
  }

  // Confirm delete function
  function confirmDelete() {
    if (confirm("هل أنت متأكد أنك تريد حذف حساب المنظمة؟")) {
      // هنا يمكنك إضافة الكود اللازم لحذف الحساب
      alert("تم حذف الحساب بنجاح!");
      // يمكنك إعادة توجيه المستخدم أو تنفيذ أي إجراء آخر بعد الحذف
    }
  }
</script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>
</main>