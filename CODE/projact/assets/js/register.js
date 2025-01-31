$(document).ready(function () {
    let cropper;

    // عند النقر على زر "اختر صورة"
    $('#uploadButton').on('click', function () {
        $('#profileImage').click();
    });

    // عند اختيار صورة
    $('#profileImage').on('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                $('#imagePreview').attr('src', event.target.result).show();

                // تهيئة Cropper.js
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(document.getElementById('imagePreview'), {
                    aspectRatio: 1, // نسبة العرض إلى الارتفاع (1:1 للمربع)
                    viewMode: 1,
                    autoCropArea: 1,
                    responsive: true,
                    guides: true,
                    movable: false,
                    rotatable: false,
                    scalable: false,
                    zoomable: false,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // عند إرسال النموذج
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        // قص الصورة وتحويلها إلى BLOB
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 200,
                height: 200,
            });

            canvas.toBlob(function (blob) {
                const formData = new FormData($('#registerForm')[0]);

                // استبدال الصورة الأصلية بالصورة المقطوعة
                formData.set('profileImage', blob, 'profile.jpg');

                // إرسال البيانات عبر AJAX
                $.ajax({
                    type: 'POST',
                    url: '../execute/register.php',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status === 'success') {
                            $('#successMessage').removeClass('d-none').text(response.message);
                            setTimeout(function () {
                                window.location.href = 'login.php';
                            }, 3000);
                        } else {
                            $('#errorMessage').removeClass('d-none').text(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#errorMessage').removeClass('d-none').text('حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.');
                        console.error(xhr.responseText);
                    }
                });
            }, 'image/jpeg');
        } else {
            // إذا لم يتم قص الصورة، إرسال النموذج بشكل عادي
            const formData = new FormData($('#registerForm')[0]);
            $.ajax({
                type: 'POST',
                url: '../execute/register.php',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        $('#successMessage').removeClass('d-none').text(response.message);
                        setTimeout(function () {
                            window.location.href = 'login.php';
                        }, 3000);
                    } else {
                        $('#errorMessage').removeClass('d-none').text(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    $('#errorMessage').removeClass('d-none').text('حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.');
                    console.error(xhr.responseText);
                }
            });
        }
    });
});