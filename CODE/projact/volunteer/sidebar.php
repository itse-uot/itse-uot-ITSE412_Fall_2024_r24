<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
      <a class="nav-link " href="dashboard.php">
        <i class="bi bi-grid"></i>
        <span>القائمه الرئيسية</span>
      </a>

      <li class="nav-item">
      <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'user.php' ? 'active' : '' ?>" href="user.php">
        <i class="bi bi-person-circle"></i>
        <span>ادارة الحساب</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link " href="request.php">
      <i class="bi bi-arrow-right-square"></i>
        <span>الطلبات المرسلة </span>
      </a>
    </li>
    
  </ul>

</aside><!-- End Sidebar-->
