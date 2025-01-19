$(document).ready(function () {
    // تحميل البيانات
    function loadProfileData() {
        $.ajax({
            type: 'POST',
            url: '../execute/get_volunteer_data.php',
            data: { action: 'get_data' }, // لا حاجة لإرسال volunteerId
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const data = response.data;
                    $('.fullName').text(data.FullName); 
                    $('.skills').text(data.Skills);
                    $('.contactNumber').text(data.ContactNumber);
                    $('.contactEmail').text(data.ContactEmail);

                    $('#fullName2').val(data.FullName);
                    $('#about').val(data.Skills);
                    $('#Phone').val(data.ContactNumber);
                    $('#Email').val(data.ContactEmail);

                    const imageUrl = 'data:image/png;base64,' + data.ProfilePicture;
                    $('.profileImage, #profileImagePreview').attr('src', imageUrl);
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

        const formData = new FormData(this);
        formData.append('action', 'update_data'); // لا حاجة لإرسال volunteerId

        $.ajax({
            type: 'POST',
            url: '../execute/update_volunteer_data.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                alert(response.message);
                if (response.status === 'success') loadProfileData();
            },
            error: function () {
                alert('حدث خطأ أثناء حفظ التغييرات.');
            }
        });
    });
});