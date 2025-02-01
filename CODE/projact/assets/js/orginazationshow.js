$(document).ready(function () {
    // تحميل البيانات
    function loadProfileData() {
        $.ajax({
            type: 'POST',
            url: '../execute/get_organization_data.php',
            data: { action: 'get_data' },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    var data = response.data;
                    // تحديث البيانات في العرض
                    $('.organizationName').text(data.OrganizationName); // عرض الاسم
                    $('.contactEmail').text(data.ContactEmail); // عرض البريد
                    $('.phoneNumber').text(data.PhoneNumber); // عرض رقم الهاتف
                    $('.field').text(data.Field); // عرض المجال
                    $('.location').text(data.Location); // عرض الموقع
                    $('.description').text(data.Description); // عرض الوصف

                    // تحديث البيانات في حقول التعديل
                    $('#organizationName').val(data.OrganizationName); // وضع الاسم في حقل التعديل
                    $('#description').val(data.Description); // وضع الوصف في حقل التعديل
                    $('#field').val(data.Field); // وضع المجال في حقل التعديل
                    $('#location').val(data.Location); // وضع الموقع في حقل التعديل
                    $('#contactEmail').val(data.ContactEmail); // وضع البريد في حقل التعديل
                    $('#phoneNumber').val(data.PhoneNumber); // وضع رقم الهاتف في حقل التعديل

                    // تعيين الصورة باستخدام Base64
                    $('.profileImage').attr('src', 'data:image/png;base64,' + data.OrganizationPicture);
                    $('#profileImagePreview').attr('src', 'data:image/png;base64,' + data.OrganizationPicture);
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
    $('#editOrganizationForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this); // استخدام FormData لتضمين الصورة
        formData.append('action', 'update_data');

        $.ajax({
            type: 'POST',
            url: '../execute/update_organization_data.php',
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