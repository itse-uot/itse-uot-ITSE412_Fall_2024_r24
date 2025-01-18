<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tatawoe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  

  <!-- Favicons -->
  <link href="../assets/img/d.png" rel="icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.rtl.min.css"  rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
<body>
  <!-- الصفحة الرئيسية -->
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- الشعار -->
              <div class="mb-3 text-center">
                <a href="index.php" class="logo d-flex align-items-center justify-content-center">
                  <!-- الأيقونة -->
                  <i class="bx bxs-circle fs-3 text-primary me-2"></i> <!-- الأيقونة -->
                  <span class="fs-4 fw-bold text-dark">Tatawoe</span> <!-- النص -->
                </a>
              </div>
              <!-- نهاية الشعار -->

              <!-- البطاقة -->
              <div class="card mb-3">
                <div class="card-body">

                  <!-- عنوان القسم -->
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">تسجيل الدخول إلى حسابك</h5>
                    <p class="text-center small">يرجى إدخال اسم المستخدم وكلمة المرور لتسجيل الدخول</p>
                  </div>

                  <!-- رسالة الخطأ -->
                  <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                    <!-- سيتم عرض رسالة الخطأ هنا -->
                  </div>

                  <!-- نموذج تسجيل الدخول -->
                  <form id="loginForm" class="row g-3 needs-validation" novalidate="">

                    <!-- حقل اسم المستخدم -->
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">اسم المستخدم</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">يرجى إدخال اسم المستخدم.</div>
                    </div>

                    <!-- حقل كلمة المرور -->
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">يرجى إدخال كلمة المرور!</div>
                    </div>

                    <!-- زر تسجيل الدخول -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>
                    </div>

                    <!-- رابط إنشاء حساب جديد -->
                    <div class="col-12">
                      <p class="small mb-0">ليس لديك حساب؟ <a href="register.php">أنشئ حسابًا جديدًا</a></p>
                    </div>
                  </form>

                </div>
              </div><!-- نهاية البطاقة -->

              <!-- التذييل -->
              <div class="credits">
                <!-- إضافة حقوق منصة التطوع -->
                جميع الحقوق محفوظة &copy; 2024 <a href="#">منصة التطوع</a>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php
  include "footer.php"; // تضمين التذييل
  include "tail.php";   // تضمين نهاية الصفحة
  ?>

  <!-- تضمين ملف JavaScript -->
  <script src="../assets/js/login.js"></script>
</body>

</html>