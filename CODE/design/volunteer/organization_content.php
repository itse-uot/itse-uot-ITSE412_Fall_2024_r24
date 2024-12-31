<main id="main" class="main">
<h1>وظيفه المنظمات</h1>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>إدارة المنظمات</title>
    
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
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="بحث" title="أدخل كلمة البحث">
        <button type="submit" title="بحث"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- شريط البحث -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item">
          <a class="nav-link nav-icon" href="notification.php">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>
        </li><!-- الإشعارات -->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/img/profile-img.jpg" alt="الملف الشخصي" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">كيفن أندرسون</span>
          </a><!-- أيقونة الملف الشخصي -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="left: auto; right: 0;">
            <li class="dropdown-header">
              <h6>كيفن أندرسون</h6>
              <span>مصمم ويب</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="volunteer_profile.php">
                <i class="bi bi-person"></i>
                <span>ملفي الشخصي</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="organizationlist.php">
                <i class="bi bi-briefcase"></i>
                <span>المنظمات</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="user.php">
                <i class="bi bi-gear"></i>
                <span>إعدادات الحساب</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>هل تحتاج إلى مساعدة؟</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>تسجيل الخروج</span>
              </a>
            </li>
          </ul><!-- قائمة الملف الشخصي -->
        </li><!-- الملف الشخصي -->

      </ul>
    </nav><!-- التنقل بالأيقونات -->

</header>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>لوحة التحكم</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="user.php">
        <i class="bi bi-grid"></i>
        <span>وظيفة إدارة الحسابات</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="volunteer.php">
        <i class="bi bi-person-lines-fill"></i>
        <span>وظيفة المتطوعين</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="organization.php">
        <i class="bi bi-grid"></i>
        <span>وظيفة المنظمات</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="event.php">
        <i class="bi bi-grid"></i>
        <span>وظيفة إدارة الفعاليات</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="request.php">
        <i class="bi bi-grid"></i>
        <span>إدارة الطلبات</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="evaluation.php">
        <i class="bi bi-grid"></i>
        <span>وظيفة التقييم</span>
      </a>
    </li>
  </ul>
</aside><!-- End Sidebar-->

<main id="main" class="main">
 

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">المنظمات المتاحة</h5>

      <!-- تفاصيل المنظمات -->
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="assets/img/profile-img.jpg" alt="Organization Logo" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">منظمة الفرح للتنمية</h5>
              <p class="card-text">المجال: التعليم</p>
              <p class="card-text">الموقع: طرابلس، ليبيا</p>
              <a href="organization_content.php" class="btn btn-primary">عرض المنظمة</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="assets/img/profile-img.jpg" alt="Organization Logo" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">منظمة الحياة الصحية</h5>
              <p class="card-text">المجال: الصحة</p>
              <p class="card-text">الموقع: بنغازي، ليبيا</p>
              <a href="organization_content.php" class="btn btn-primary">عرض المنظمة</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="assets/img/profile-img.jpg" alt="Organization Logo" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">منظمة الأمل البيئي</h5>
              <p class="card-text">المجال: البيئة</p>
              <p class="card-text">الموقع: مصراتة، ليبيا</p>
              <a href="organization_content.php" class="btn btn-primary">عرض المنظمة</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="assets/img/profile-img.jpg" alt="Organization Logo" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">منظمة الأصدقاء للتكنولوجيا</h5>
              <p class="card-text">المجال: التكنولوجيا</p>
              <p class="card-text">الموقع: طرابلس، ليبيا</p>
              <a href="organization_content.php" class="btn btn-primary">عرض المنظمة</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="assets/img/profile-img.jpg" alt="Organization Logo" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">منظمة الرواية الثقافية</h5>
              <p class="card-text">المجال: الثقافة</p>
              <p class="card-text">الموقع: سرت، ليبيا</p>
              <a href="organization_content.php" class="btn btn-primary">عرض المنظمة</a>
            </div>
          </div>
        </div>
      </div>
      <!-- يمكنك تكرار الكود أعلاه لعرض المزيد من المنظمات -->
    </div>
  </div>
</main>

<footer id="footer" class="footer">
  <div class="copyright">
    &copy; 2024 جميع الحقوق محفوظة
  </div>
</footer>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle sidebar visibility
  document.querySelector('.toggle-sidebar-btn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('toggle');
  });
</script>

<!-- Modal for Notifications -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">واجهة الإشعارات</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="notifications" style="max-width: 800px; margin: 0 auto; direction: rtl;">
          <!-- إشعار -->
          <div class="notification-item" style="display: flex; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
            <i class="bi bi-exclamation-circle text-warning" style="font-size: 24px; margin-left: 10px;"></i>
            <div>
              <h4 style="margin: 0; font-size: 18px;">تحديث بيانات الحساب</h4>
              <p style="margin: 0; font-size: 14px; color: #888;">قبل 30 د</p>
            </div>
          </div>
          <!-- يمكنك إضافة المزيد من الإشعارات هنا -->
          <div style="text-align: center; margin-top: 20px;">
            <a href="notification.php" style="text-decoration: none; font-size: 16px; color: #007bff;">عرض جميع الإشعارات</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Profile -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">الملف الشخصي</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>معلومات المستخدم هنا.</p>
        <!-- يمكنك إضافة المزيد من المعلومات حول المستخدم هنا -->
      </div>
    </div>
  </div>
</div>

</body>

</html>
</main>