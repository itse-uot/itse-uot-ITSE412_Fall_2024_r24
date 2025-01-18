$(document).ready(function () {
    // رقم المتطوع

    // تحميل البيانات
    function loadProfileData() {
        $.ajax({
            type: 'POST',
            url: '../execute/get_volunteer_data.php',
            data: { action: 'get_data' },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    var data = response.data;
                    // تحديث البيانات في العرض
                    // $('.fullNametitle').text(data.FullName); // عرض الاسم في الترويسة
                    $('.fullName').text(data.FullName); // عرض الاسم في الحقل
                    $('.skills').text(data.Skills); // عرض المهارات
                    $('.contactNumber').text(data.ContactNumber); // عرض رقم الهاتف
                    $('.contactEmail').text(data.ContactEmail); // عرض البريد

                    // تحديث البيانات في حقول التعديل
                    $('#fullName2').val(data.FullName); // وضع الاسم في حقل التعديل
                    $('#about').val(data.Skills); // وضع المهارات في حقل التعديل
                    $('#Phone').val(data.ContactNumber); // وضع رقم الهاتف في حقل التعديل
                    $('#Email').val(data.ContactEmail); // وضع البريد في حقل التعديل

                    // تعيين الصورة باستخدام Base64
                    $('.profileImage').attr('src', 'data:image/png;base64,' + data.ProfilePicture);
                    $('#profileImagePreview').attr('src', 'data:image/png;base64,' + data.ProfilePicture);
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء تحميل البيانات.');
            }
        });
    }

    // استدعاء التحميل عند فتح الصفحة
    loadProfileData();

    // حفظ التغييرات
    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this); // استخدام FormData لتضمين الصورة
        formData.append('action', 'update_data');
        formData.append('volunteerId', volunteerId);

        $.ajax({
            type: 'POST',
            url: '../execute/update_volunteer_data.php',
            data: formData,
            processData: false, // لا تقم بمعالجة البيانات بشكل عادي
            contentType: false, // لا تقم بتحديد نوع المحتوى (ليتم التعامل مع الـ FormData بشكل صحيح)
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    loadProfileData(); // تحديث البيانات في الحقول
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء حفظ التغييرات.');
            }
        });
    });
});