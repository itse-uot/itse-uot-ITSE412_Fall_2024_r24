$(document).ready(function () {
  // عند إرسال النموذج
  $('#loginForm').on('submit', function (e) {
      e.preventDefault(); // منع إرسال النموذج بشكل عادي

      // إخفاء رسالة الخطأ إذا كانت ظاهرة
      $('#errorMessage').addClass('d-none').text('');

      // جمع بيانات النموذج
      var formData = {
          username: $('#yourUsername').val(),
          password: $('#yourPassword').val()
      };

      // التحقق من المدخلات
      if (!formData.username || !formData.password) {
          $('#errorMessage').removeClass('d-none').text('يرجى ملء جميع الحقول المطلوبة.');
          return;
      }

      // إرسال البيانات عبر AJAX
      $.ajax({
          type: 'POST',
          url: '../execute/login.php', // ملف التنفيذي
          data: formData,
          dataType: 'json',
          success: function (response) {
              if (response.status === 'success') {
                  // إذا كان تسجيل الدخول ناجحًا، توجيه المستخدم إلى الصفحة الرئيسية
                  window.location.href = 'dashboard.php';
              } else {
                  // إذا فشل تسجيل الدخول، عرض رسالة الخطأ
                  $('#errorMessage').removeClass('d-none').text(response.message);
              }
          },
          error: function () {
              // في حالة حدوث خطأ في الاتصال بالخادم
              $('#errorMessage').removeClass('d-none').text('حدث خطأ أثناء تسجيل الدخول. يرجى المحاولة مرة أخرى.');
          }
      });
  });
});