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
                    <h5 class="card-title text-center pb-0 fs-4">إنشاء حساب جديد</h5>
                    <p class="text-center small">يرجى إدخال البيانات لإنشاء حسابك</p>
                  </div>

                  <!-- رسالة الخطأ -->
                  <div id="errorMessage" class="alert alert-danger d-none" role="alert">
                    <!-- سيتم عرض رسالة الخطأ هنا -->
                  </div>

                  <!-- رسالة النجاح -->
                  <div id="successMessage" class="alert alert-success d-none" role="alert">
                    <!-- سيتم عرض رسالة النجاح هنا -->
                  </div>

                  <!-- نموذج التسجيل -->
                  <form id="registerForm" class="row g-3 needs-validation" novalidate="">

                    <!-- حقل اسم المستخدم -->
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">اسم المستخدم</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">يرجى إدخال اسم المستخدم.</div>
                    </div>

                    <!-- حقل البريد الإلكتروني -->
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">البريد الإلكتروني</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">يرجى إدخال بريد إلكتروني صحيح.</div>
                    </div>

                    <!-- حقل كلمة المرور -->
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل وتحتوي على أرقام وحروف إنجليزية.</div>
                    </div>

                    <!-- زر إنشاء الحساب -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">إنشاء الحساب</button>
                    </div>

                    <!-- رابط تسجيل الدخول -->
                    <div class="col-12">
                      <p class="small mb-0">لديك حساب بالفعل؟ <a href="login.php">سجل الدخول</a></p>
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
  <script src="../assets/js/register.js"></script>
</body>

</html>