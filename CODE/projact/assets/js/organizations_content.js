$(document).ready(function () {
    let cropper;
    let resizedFile; // لتخزين الصورة المصغرة

    // دالة لجلب الطلبات المرسلة
    function fetchApplications() {
        $.ajax({
            url: 'applications_handler.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    if (response.data.length === 0) {
                        $('#applicationsContainer').html('<div class="alert alert-info">لا توجد طلبات مرسلة.</div>');
                    } else {
                        let html = '';
                        response.data.forEach(function (application) {
                            html += `
                                <div class="card w-100 mb-3 py-2" id="application-${application.ApplicationID}">
                                    <div class="card-body">
                                        <h5 class="card-title">${application.EventName}</h5>
                                        <p class="card-text">الموقع: ${application.Location}</p>
                                        <p class="card-text">الحالة: ${application.ApplicationStatus}</p>
                                        <button class="btn btn-outline-danger cancel-application" data-id="${application.ApplicationID}">إلغاء الطلب</button>
                                    </div>
                                </div>`;
                        });
                        $('#applicationsContainer').html(html);
                    }
                } else {
                    $('#applicationsContainer').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function () {
                $('#applicationsContainer').html('<div class="alert alert-danger">حدث خطأ أثناء جلب البيانات.</div>');
            }
        });
    }

    // جلب الطلبات عند تحميل الصفحة
    fetchApplications();

    // إلغاء الطلب
    $(document).on('click', '.cancel-application', function () {
        const applicationID = $(this).data('id');
        if (confirm('هل أنت متأكد من إلغاء هذا الطلب؟')) {
            $.ajax({
                url: 'applications_handler.php',
                method: 'POST',
                data: { applicationID: applicationID },
                dataType: 'json',
                success: function (response) {
                    alert(response.message);
                    if (response.status === 'success') {
                        fetchApplications(); // إعادة جلب الطلبات بعد الإلغاء
                    }
                },
                error: function () {
                    alert('حدث خطأ أثناء الاتصال بالخادم.');
                }
            });
        }
    });

    // دالة لجلب المنظمات
    function fetchOrganizations() {
        $.ajax({
            url: '../execute/organization_handler.php',
            method: 'POST',
            data: { action: 'fetch' },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    if (response.data.length === 0) {
                        $('#organizationsContainer').html('<div class="alert alert-info">لا توجد منظمات.</div>');
                    } else {
                        let html = '';
                        response.data.forEach(function (organization) {
                            let imageSrc = organization.OrganizationPicture
                                ? `data:image/jpeg;base64,${organization.OrganizationPicture}`
                                : 'default-image.png';
                            html += `
                                <div class="card w-100 mb-3 py-2" id="organization-${organization.OrganizationID}">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center" style="gap: 20px;">
                                            <img src="${imageSrc}" alt="Organization Logo" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            <div>
                                                <h5 class="card-title mb-0">
                                                    <a href="../organization/dashboard.php?orgID=${organization.OrganizationID}" class="text-decoration-none text-dark">${organization.OrganizationName}</a>
                                                </h5>
                                                <p class="mb-0 text-muted">المجال: ${organization.Field}</p>
                                                <p class="mb-0 text-muted">الموقع: ${organization.Location}</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-danger delete-organization" data-id="${organization.OrganizationID}">حذف</button>
                                    </div>
                                </div>`;
                        });
                        $('#organizationsContainer').html(html);
                    }
                } else {
                    $('#organizationsContainer').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function () {
                $('#organizationsContainer').html('<div class="alert alert-danger">حدث خطأ أثناء جلب البيانات.</div>');
            }
        });
    }

    // جلب المنظمات عند تحميل الصفحة
    fetchOrganizations();

    // عند النقر على زر "اختر صورة"
    $('#uploadButton').on('click', function () {
        $('#profilePicture').click();
    });

    // عند اختيار صورة
    $('#profilePicture').on('change', function (e) {
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

                // قص الصورة وتحويلها إلى Blob
                const canvas = cropper.getCroppedCanvas({
                    width: 800, // الحد الأقصى للعرض
                    height: 800, // الحد الأقصى للارتفاع
                });

                canvas.toBlob(function (blob) {
                    resizedFile = new File([blob], file.name, { type: 'image/jpeg' });
                }, 'image/jpeg', 0.8); // 0.8 هي جودة الصورة (80%)
            };
            reader.readAsDataURL(file);
        }
    });

    // إضافة منظمة جديدة
    $('#createOrganizationForm').on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        // استبدال الصورة الأصلية بالصورة المصغرة
        if (resizedFile) {
            formData.set('profilePicture', resizedFile);
        }

        formData.append('action', 'add');

        $.ajax({
            url: '../execute/organization_handler.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                alert(response.message);
                if (response.status === 'success') {
                    fetchOrganizations();
                }
            },
            error: function () {
                alert('حدث خطأ أثناء الاتصال بالخادم.');
            }
        });
    });

    // حذف منظمة
    $(document).on('click', '.delete-organization', function () {
        const organizationID = $(this).data('id');
        if (confirm('هل أنت متأكد من حذف هذه المنظمة؟')) {
            $.ajax({
                url: '../execute/organization_handler.php',
                method: 'POST',
                data: { action: 'delete', organizationID: organizationID },
                dataType: 'json',
                success: function (response) {
                    alert(response.message);
                    if (response.status === 'success') {
                        $(`#organization-${organizationID}`).remove();
                    }
                },
                error: function () {
                    alert('حدث خطأ أثناء الاتصال بالخادم.');
                }
            });
        }
    });
});