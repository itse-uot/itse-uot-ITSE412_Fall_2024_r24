$(document).ready(function () {
  // دالة لجلب الطلبات المرسلة
  function fetchApplications() {
      $.ajax({
          url: '../execute/fetch_applications.php',
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
                                  <div class="card-body d-flex justify-content-between align-items-center">
                                      <!-- معلومات المستخدم -->
                                      <div class="d-flex align-items-center gap-3">
                                          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"
                                              style="width: 50px; height: 50px; object-fit: cover;">
                                          <div>
                                              <h5 class="card-title mb-0">${application.OrganizationName}</h5>
                                              <small style="color: #6c757d;">${application.ContactEmail}</small>
                                          </div>
                                      </div>

                                      <!-- معلومات الفعالية -->
                                      <div class="text-end">
                                          <small class="d-block" style="font-size: 14px; color: #495057;">
                                              <strong>فعالية:</strong> ${application.EventName}
                                          </small>
                                          <small class="d-block" style="font-size: 14px; color: #6c757d;">
                                              <strong>الموقع:</strong> ${application.Location}
                                          </small>
                                      </div>

                                      <!-- حالة الطلب -->
                                      <div class="d-flex gap-2">
                                          ${getStatusButton(application.ApplicationsStatus, application.ApplicationID)}
                                      </div>
                                  </div>
                              </div>
                          `;
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

  // دالة لإنشاء زر الحالة أو زر الإلغاء
  function getStatusButton(status, applicationID) {
    switch (status) {
        case 'Pending':
            return `<button type="button" class="btn btn-sm btn-danger cancel-application" data-id="${applicationID}">إلغاء الطلب</button>`;
        case 'Accepted':
            return '<span class="status-text accepted">تم القبول</span>';
        case 'Rejected':
            return '<span class="status-text rejected">تم الرفض</span>';
        default:
            return '<span class="status-text unknown">غير معروف</span>';
    }
}

  // جلب الطلبات عند تحميل الصفحة
  fetchApplications();

  // إضافة حدث للنقر على زر الإلغاء
  $(document).on('click', '.cancel-application', function () {
      const applicationID = $(this).data('id');
      if (confirm('هل أنت متأكد من إلغاء هذا الطلب؟')) {
          $.ajax({
              url: '../execute/cancel_application.php',
              method: 'POST',
              data: { applicationID: applicationID },
              dataType: 'json',
              success: function (response) {
                  if (response.status === 'success') {
                      // إزالة الطلب من الواجهة
                      $(`#application-${applicationID}`).remove();
                      alert('تم إلغاء الطلب بنجاح.');
                  } else {
                      alert('حدث خطأ أثناء إلغاء الطلب: ' + response.message);
                  }
              },
              error: function () {
                  alert('حدث خطأ أثناء الاتصال بالخادم.');
              }
          });
      }
  });
});