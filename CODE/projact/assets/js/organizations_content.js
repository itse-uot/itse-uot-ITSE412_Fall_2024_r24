$(document).ready(function () {
  // دالة لجلب المنظمات
  function fetchOrganizations() {
      $.ajax({
          url: '../execute/fetch_organizations.php',
          method: 'GET',
          dataType: 'json',
          success: function (response) {
              if (response.status === 'success') {
                  if (response.data.length === 0) {
                      $('#organizationsContainer').html('<div class="alert alert-info">لا توجد منظمات.</div>');
                  } else {
                      let html = '';
                      response.data.forEach(function (organization) {
                          html += `
                              <div class="card w-100 mb-3 py-2" id="organization-${organization.OrganizationID}">
                                  <div class="card-body d-flex align-items-center justify-content-between" style="width: 100%;">
                                      <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                                          <img src="data:image/jpeg;base64,${btoa(String.fromCharCode.apply(null, organization.OrganizationPicture))}" alt="Organization Logo" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
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
                              </div>
                          `;
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

  // إضافة حدث للنقر على زر الحذف
  $(document).on('click', '.delete-organization', function () {
      const organizationID = $(this).data('id');
      if (confirm('هل أنت متأكد من حذف هذه المنظمة؟')) {
          $.ajax({
              url: '../execute/delete_organization.php',
              method: 'POST',
              data: { organizationID: organizationID },
              dataType: 'json',
              success: function (response) {
                  if (response.status === 'success') {
                      $(`#organization-${organizationID}`).remove();
                      alert('تم حذف المنظمة بنجاح.');
                  } else {
                      alert('حدث خطأ أثناء حذف المنظمة: ' + response.message);
                  }
              },
              error: function () {
                  alert('حدث خطأ أثناء الاتصال بالخادم.');
              }
          });
      }
  });

  // إضافة حدث لإرسال نموذج إنشاء منظمة
  $('#createOrganizationForm').on('submit', function (e) {
      e.preventDefault();
      var formData = new FormData(this);

      $.ajax({
          url: '../execute/create_organization.php',
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function (response) {
              if (response.status === 'success') {
                  alert('تم إنشاء المنظمة بنجاح.');
                  fetchOrganizations();
              } else {
                  alert('حدث خطأ أثناء إنشاء المنظمة: ' + response.message);
              }
          },
          error: function () {
              alert('حدث خطأ أثناء الاتصال بالخادم.');
          }
      });
  });
});