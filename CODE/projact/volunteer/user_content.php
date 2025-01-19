<main id="main" class="main">
    <div class="card bg-white p-4 rounded border shadow">
        <h5 class="card-title text-center mb-4">إعدادات الحساب</h5>
        <!-- Horizontal Form -->
        <form id="userForm">
            <!-- الاسم -->
            <div class="mb-3">
                <label for="inputText" class="form-label fw-bold">اسم المستخدم</label>
                <input type="text" class="form-control" id="inputText" name="Username">
            </div>
            <!-- البريد الالكتروني -->
            <div class="mb-3">
                <label for="inputEmail" class="form-label fw-bold">البريد الالكتروني</label>
                <input type="email" class="form-control" id="inputEmail" name="Email">
            </div>
            <!-- كلمة السر -->
            <div class="mb-3">
                <label for="inputPassword" class="form-label fw-bold">كلمة السر</label>
                <input type="password" class="form-control" id="inputPassword" name="Password">
            </div>
            <!-- الأزرار -->
            <div class="text-center">
    <button type="button" id="saveChanges" class="btn btn-outline-primary">حفظ</button>
    <button type="button" id="deleteAccount" class="btn btn-outline-danger px-4" data-bs-toggle="modal" data-bs-target="#basicModal">
        حذف
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">رسالة تنبيه!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">هل متأكد من أنك تريد حذف حسابك؟</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                <button type="button" id="confirmDelete" class="btn btn-danger">تأكيد</button>
            </div>
        </div>
    </div>
</div>
</main>
<script>
$(document).ready(function () {
    // تحميل بيانات المستخدم
    function loadUserData() {
        $.ajax({
            url: '../execute/loadUserData.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#inputText').val(data.Username);
                $('#inputEmail').val(data.Email);
                $('#inputPassword').val(data.Password);
            },
            error: function () {
                alert('خطأ في تحميل البيانات.');
            }
        });
    }

    // استدعاء تحميل البيانات عند فتح الصفحة
    loadUserData();

    // حفظ التعديلات
    $('#saveChanges').click(function () {
        const formData = {
            Username: $('#inputText').val(),
            Email: $('#inputEmail').val(),
            Password: $('#inputPassword').val(),
        };

        $.ajax({
            url: '../execute/updateUser.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                alert(response.message);
                loadUserData(); // إعادة تحميل البيانات بعد التحديث
            },
            error: function () {
                alert('خطأ أثناء تحديث البيانات.');
            }
        });
    });

    // حذف الحساب

});

$(document).ready(function () {
    // عند الضغط على زر تأكيد الحذف
    $('#confirmDelete').click(function () {
        $.ajax({
            type: 'POST',
            url: '../execute/deleteUser.php', // ملف الحذف
            data: { action: 'delete_account' }, // إرسال الإجراء
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message); // عرض رسالة النجاح
                    window.location.href = 'login.php'; // تحويل المستخدم إلى صفحة تسجيل الدخول
                } else {
                    alert(response.message); // عرض رسالة الخطأ
                }
            },
            error: function () {
                alert('حدث خطأ أثناء محاولة حذف الحساب.');
            }
        });
    });
});

</script>