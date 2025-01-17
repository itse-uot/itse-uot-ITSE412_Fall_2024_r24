<!DOCTYPE html>
<html lang="ar">

<?php
include "head.php"; // تضمين الرأس
?>

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
  <script src="assets/js/login.js"></script>
</body>

</html>