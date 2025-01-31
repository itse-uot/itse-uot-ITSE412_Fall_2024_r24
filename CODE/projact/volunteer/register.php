<!DOCTYPE html>
<html lang="ar" dir="rtl">

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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Cropper CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 d-flex flex-column align-items-center justify-content-center">

              <!-- الشعار -->
              <div class="mb-4 text-center">
                <a href="index.php" class="logo d-flex align-items-center justify-content-center">
                  <i class="bx bxs-circle fs-3 text-primary me-2"></i>
                  <span class="fs-4 fw-bold text-dark">Tatawoe</span>
                </a>

              </div>

              <!-- البطاقة -->
              <div class="card mb-3 w-100">
                <div class="card-body p-4">

                  <!-- عنوان القسم -->
                  <div class="pt-3 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">إنشاء حساب جديد</h5>
                    <p class="text-center small text-muted">يرجى إدخال البيانات لإنشاء حسابك</p>
                  </div>

                  <!-- رسالة الخطأ -->
                  <div id="errorMessage" class="alert alert-danger d-none" role="alert"></div>

                  <!-- رسالة النجاح -->
                  <div id="successMessage" class="alert alert-success d-none" role="alert"></div>

                  <!-- نموذج التسجيل -->
                  <form id="registerForm" class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">
                    <!-- حقول النموذج -->
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">اسم المستخدم</label>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">يرجى إدخال اسم المستخدم.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">البريد الإلكتروني</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">يرجى إدخال بريد إلكتروني صحيح.</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">كلمة المرور</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل وتحتوي على أرقام وحروف
                        إنجليزية.</div>
                    </div>

                    <div class="col-12">
                      <label for="fullName" class="form-label">الاسم الكامل</label>
                      <input type="text" name="fullName" class="form-control" id="fullName" required>
                      <div class="invalid-feedback">يرجى إدخال الاسم الكامل.</div>
                    </div>

                    <div class="col-12">
                      <label for="skills" class="form-label">المهارات</label>
                      <textarea name="skills" class="form-control" id="skills" required></textarea>
                      <div class="invalid-feedback">يرجى إدخال المهارات.</div>
                    </div>

                    <div class="col-12">
                      <label for="contactNumber" class="form-label">رقم الهاتف</label>
                      <input type="text" name="contactNumber" class="form-control" id="contactNumber" required>
                      <div class="invalid-feedback">يرجى إدخال رقم هاتف صحيح.</div>
                    </div>

                    
                    <div class="col-12">
    <label for="profileImage" class="form-label">صورة الملف الشخصي</label>
    <input type="file" name="profileImage" class="form-control" id="profileImage" accept="image/*" style="display: none;">
    <button type="button" class="btn btn-secondary w-100" id="uploadButton">اختر صورة</button>
    <div class="mt-3">
        <img id="imagePreview" src="#" alt="الصورة المختارة" style="max-width: 100%; display: none;">
    </div>
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
              </div>

              <!-- التذييل -->
              <div class="credits text-center mt-4">
                جميع الحقوق محفوظة &copy; 2024 <a href="#">منصة التطوع</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <?php
  include "tail.php";   // تضمين نهاية الصفحة
  ?>

  <!-- تضمين ملف JavaScript -->
  <script src="../assets/js/register.js"></script>
 

<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
</body>

</html>