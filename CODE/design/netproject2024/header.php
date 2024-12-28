<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">NiceAdmin</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form> -->
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown" style="margin-left: 70px;">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">4</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">



          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>تحديث بيانات الحساب</h4>
              <p></p>
              <p> قبل 30 د</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-x-circle text-danger"></i>
            <div>
              <h4>رفض الطلب</h4>
              <p>لقد تم رفضك في الفاعاليه</p>
              <p>قبل ساعة</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-check-circle text-success"></i>
            <div>
              <h4>قبول الطلب </h4>
              <p>لقد تم قبولك في الفاعليه</p>
              <p>قبل ساعتان</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-info-circle text-primary"></i>
            <div>
              <h4>اشعارات اخرى</h4>
              <p>تتضمن اشعارا </p>
              <p>قبل 4ساعات</p>
            </div>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="">
            <a href="notification.php">عرض جميع الاشعارات</a>
          </li>

        </ul><!-- End Notification Dropdown Items -->

      </li><!-- End Notification Nav -->



      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">ااسم المتطوع</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>اسم المتطوع</h6> 

          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="volunteer_profile.php">
              <i class="bi bi-person"></i>
              <span>الملف الشخصي</span>
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

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
