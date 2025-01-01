<!DOCTYPE html>

<?php
  include "head.php";
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
              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="شعار الموقع">
                  <span class="d-none d-lg-block">منصة التطوع</span>
                </a>
              </div><!-- نهاية الشعار -->

              <!-- البطاقة -->
              <div class="card mb-3">

                <div class="card-body">

                  <!-- عنوان القسم -->
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">إنشاء حساب جديد</h5>
                    <p class="text-center small">يرجى إدخال البيانات لإنشاء حسابك</p>
                  </div>

                  <!-- نموذج التسجيل -->
                  <form class="row g-3 needs-validation" action="welcome.php" method="POST" novalidate="">

                    <!-- حقل اسم المستخدم الأول -->
                    <div class="col-12">
                      <label for="yourFirstName" class="form-label">اسم المستخدم</label>
                      <input type="text" name="first_name" class="form-control" id="yourFirstName" required="">
                      <div class="invalid-feedback">يرجى إدخال اسم المستخدم الأول.</div>
                    </div>

                    <!-- حقل البريد الإلكتروني -->
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">البريد الإلكتروني</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required="">
                      <div class="invalid-feedback">يرجى إدخال بريد إلكتروني صحيح.</div>
                    </div>

                    <!-- حقل كلمة المرور -->
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required="">
                      <div class="invalid-feedback">يرجى إدخال كلمة المرور!</div>
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
                جميع الحقوق محفوظة &copy; 2024 <a href="index.php">منصة التطوع</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>

  </main>

  <?php
 include "footer.php";
 include "tail.php";
 ?>

</body>

</html>
