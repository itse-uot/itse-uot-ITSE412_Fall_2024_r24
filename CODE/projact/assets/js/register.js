if (typeof jQuery === 'undefined') {
  console.error('jQuery غير محملة! يرجى التأكد من تحميل jQuery قبل هذا الملف.');
} else {
  $(document).ready(function () {
      // عند إرسال النموذج
      $('#registerForm').on('submit', function (e) {
          e.preventDefault(); // منع إرسال النموذج بشكل عادي

          // إخفاء رسائل الخطأ والنجاح إذا كانت ظاهرة
          $('#errorMessage').addClass('d-none').text('');
          $('#successMessage').addClass('d-none').text('');

          // جمع بيانات النموذج
          var formData = {
              username: $('#yourUsername').val().trim(),
              email: $('#yourEmail').val().trim(),
              password: $('#yourPassword').val().trim()
          };

          // التحقق من المدخلات
          if (!formData.username || !formData.email || !formData.password) {
              $('#errorMessage').removeClass('d-none').text('يرجى ملء جميع الحقول المطلوبة.');
              return;
          }

          // التحقق من صحة البريد الإلكتروني
          var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(formData.email)) {
              $('#errorMessage').removeClass('d-none').text('البريد الإلكتروني غير صحيح.');
              return;
          }

          // التحقق من قوة كلمة المرور
          var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
          if (!passwordPattern.test(formData.password)) {
              $('#errorMessage').removeClass('d-none').text('كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل وتحتوي على أرقام وحروف إنجليزية.');
              return;
          }

          // إرسال البيانات عبر AJAX
          $.ajax({
              type: 'POST',
              url: '../../execute/register.php', // ملف التنفيذي
              data: formData,
              dataType: 'json',
              success: function (response) {
                  if (response.status === 'success') {
                      // إذا كان التسجيل ناجحًا، عرض رسالة النجاح
                      $('#successMessage').removeClass('d-none').text(response.message);

                      // توجيه المستخدم إلى صفحة تسجيل الدخول بعد 3 ثواني
                      setTimeout(function () {
                          window.location.href = 'login.php';
                      }, 3000);
                  } else {
                      // إذا فشل التسجيل، عرض رسالة الخطأ
                      $('#errorMessage').removeClass('d-none').text(response.message);
                  }
              },
              error: function (xhr, status, error) {
                  // في حالة حدوث خطأ في الاتصال بالخادم
                  $('#errorMessage').removeClass('d-none').text('حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.');
                  console.error(xhr.responseText); // طباعة الخطأ في الكونسول
              }
          });
      });
  });
}