$(document).ready(function () {
    // عند إرسال النموذج
    $('#registerForm').on('submit', function (e) {
        e.preventDefault(); // منع إرسال النموذج بشكل عادي
  
        // إخفاء رسائل الخطأ والنجاح إذا كانت ظاهرة
        $('#errorMessage').addClass('d-none').text('');
        $('#successMessage').addClass('d-none').text('');
  
        // جمع بيانات النموذج
        var formData = new FormData(this); // استخدام FormData لإرسال الملفات
  
        // التحقق من المدخلات
        if (!formData.get('username') || !formData.get('email') || !formData.get('password') || 
            !formData.get('fullName') || !formData.get('skills') || !formData.get('contactNumber') || 
            !formData.get('contactEmail')) {
            $('#errorMessage').removeClass('d-none').text('يرجى ملء جميع الحقول المطلوبة.');
            return;
        }
  
        // التحقق من صحة البريد الإلكتروني
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(formData.get('email')) || !emailPattern.test(formData.get('contactEmail'))) {
            $('#errorMessage').removeClass('d-none').text('البريد الإلكتروني غير صحيح.');
            return;
        }
  
        // التحقق من قوة كلمة المرور
        var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!passwordPattern.test(formData.get('password'))) {
            $('#errorMessage').removeClass('d-none').text('كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل وتحتوي على أرقام وحروف إنجليزية.');
            return;
        }
  
        // إرسال البيانات عبر AJAX
        $.ajax({
            type: 'POST',
            url: '../execute/register.php', // ملف التنفيذي
            data: formData,
            dataType: 'json',
            processData: false, // عدم معالجة البيانات
            contentType: false, // عدم تعيين نوع المحتوى
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