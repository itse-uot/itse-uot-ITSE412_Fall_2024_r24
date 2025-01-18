<main id="main" class="main">

    <!-- Form Wrapper -->
    <div class="card bg-white p-4 rounded border shadow">
        <h5 class="card-title text-center mb-4">أعدادات الحساب</h5>
        <!-- Horizontal Form -->
        <form id="updateForm">
            <!-- الاسم -->
            <div class="mb-3">
                <label for="inputText" class="form-label fw-bold">اسم المستخدم</label>
                <input type="text" class="form-control" id="inputText" >
            </div>

            <!-- البريد الالكتروني -->
            <div class="mb-3">
                <label for="inputEmail" class="form-label fw-bold">البريد الالكتروني</label>
                <input type="email" class="form-control" id="inputEmail" >
            </div>

            <!-- كلمه السر -->
            <div class="mb-3">
                <label for="inputPassword" class="form-label fw-bold">كلمه السر</label>
                <input type="password" class="form-control" id="inputPassword" >
            </div>

            <!-- الأزرار -->
            <div class="text-center">
                <button type="submit" class="btn btn-outline-primary">حفظ</button>
                <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal" data-bs-target="#basicModal">
                    حذف
                </button>
            </div>
        </form>
        <!-- End Horizontal Form -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">رسالة تنبيه!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    هل متأكد من انك تريد حذف حسابك!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">تأكيد</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</main>
<script>
$(document).ready(function () {
    // تحميل البيانات
    function loadUserData() {
        $.ajax({
            type: 'GET',
            url: '../excute/get_user_data.php',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    $('#inputText').val(response.data.username);
                    $('#inputEmail').val(response.data.email);
                    $('#inputPassword').val(response.data.password); // في حال كان كلمة السر مشفرة، لا تظهرها
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء تحميل البيانات.');
            }
        });
    }

    // استدعاء تحميل البيانات عند فتح الصفحة
    loadUserData();

    // حفظ التعديلات
    $('#updateForm').on('submit', function (e) {
        e.preventDefault();
        
        var userData = {
            username: $('#inputText').val(),
            email: $('#inputEmail').val(),
            password: $('#inputPassword').val(),
        };

        $.ajax({
            type: 'POST',
            url: '../excute/update_user_data.php',
            data: userData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    loadUserData(); // تحديث البيانات في الحقول
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء حفظ التغييرات.');
            }
        });
    });

    // حذف الحساب
    $('#confirmDelete').on('click', function () {
        $.ajax({
            type: 'POST',
            url: '../excute/delete_user.php',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    // بعد الحذف، يمكن توجيه المستخدم إلى صفحة تسجيل الدخول أو الصفحة الرئيسية
                    window.location.href = 'login.php'; // مثال
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء الحذف.');
            }
        });
    });
});
</script>