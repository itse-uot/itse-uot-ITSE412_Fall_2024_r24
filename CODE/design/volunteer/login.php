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
                    <h5 class="card-title text-center pb-0 fs-4">تسجيل الدخول إلى حسابك</h5>
                    <p class="text-center small">يرجى إدخال اسم المستخدم وكلمة المرور لتسجيل الدخول</p>
                  </div>

                  <!-- نموذج تسجيل الدخول -->
                  <form class="row g-3 needs-validation" action="dashboard.php" method="POST" novalidate="">

                    <!-- حقل اسم المستخدم -->
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">اسم المستخدم</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required="">
                        <div class="invalid-feedback">يرجى إدخال اسم المستخدم.</div>
                      </div>
                    </div>

                    <!-- حقل كلمة المرور -->
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required="">
                      <div class="invalid-feedback">يرجى إدخال كلمة المرور!</div>
                    </div>

                    <!-- خيار تذكرني -->
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">تذكرني</label>
                      </div>
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
