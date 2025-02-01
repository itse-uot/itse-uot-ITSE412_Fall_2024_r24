<header id="header" class="header fixed-top d-flex align-items-center" dir="rtl">

  <div class="d-flex align-items-center justify-content-between">
    <!-- الشعار -->
    <a href="index.html" class="logo d-flex align-items-center">
      <i class="bx bxs-circle fs-3 text-primary me-2"></i> <!-- الأيقونة -->
      <span class="d-none d-lg-block fs-4 fw-bold text-dark">Tatawoe</span> <!-- النص -->
    </a>
    <!-- زر القائمة -->
    <i class="bi bi-list toggle-sidebar-btn fs-3 text-dark"></i>
  </div><!-- Logo -->



  <div class="search-bar">
  <form class="search-form d-flex align-items-center" id="searchForm" method="GET" action="search.php">
    <input type="text" name="query" id="searchQuery" placeholder="بحث" title="أدخل كلمة البحث" class="form-control me-2">
    <button type="submit" title="بحث" class="btn btn-primary" id="searchButton">
      <i class="bi bi-search"></i>
    </button>
  </form>
</div>
  <!-- شريط البحث -->

  <!-- شريط البحث -->
  <!-- Example single danger button -->
  <!-- زر القائمة المنسدلة -->



  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item">
        <a class="nav-link nav-icon" href="notification.php">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">4</span>
        </a>
      </li><!-- الإشعارات -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img src="assets/img/prof.jpeg" alt="الملف الشخصي" class="rounded-circle profileImage">
          <span class="d-none d-md-block dropdown-toggle ps-2 organizationName" ></span>
        </a><!-- أيقونة الملف الشخصي -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="left: auto; right: 0;">
          <li class="dropdown-header">
            <h6 class="organizationName"></h6>
  
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="organization_profile.php">
              <i class="bi bi-person"></i>
              <span>ملفي الشخصي</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="../volunteer/organizationlist.php">
              <i class="ri-arrow-go-forward-line"></i>
              <span>العودة إلى متطوع</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
        </ul><!-- قائمة الملف الشخصي -->
      </li><!-- الملف الشخصي -->

    </ul>
  </nav><!-- التنقل بالأيقونات -->

</header>