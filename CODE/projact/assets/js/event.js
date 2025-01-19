$(document).ready(function () {
  // عند إرسال النموذج
  $('#eventForm').on('submit', function (e) {
      e.preventDefault(); // منع إرسال النموذج بشكل عادي

      // جمع بيانات النموذج
      var formData = new FormData();
      formData.append('eventName', $('#eventName').val());
      formData.append('eventStartDate', $('#eventStartDate').val());
      formData.append('eventEndDate', $('#eventEndDate').val());
      formData.append('eventLocation', $('#eventLocation').val());
      formData.append('eventSkills', $('#eventSkills').val());
      formData.append('eventDescription', $('#eventDescription').val());
      formData.append('eventImage', $('#eventImage')[0].files[0]);

      // إرسال البيانات عبر AJAX
      $.ajax({
          type: 'POST',
          url: '../execute/create_event.php', // ملف التنفيذي
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function (response) {
              if (response.status === 'success') {
                  // إذا تم إنشاء الفعالية بنجاح، إعادة تحميل الصفحة أو عرض رسالة نجاح
                  alert('تم إنشاء الفعالية بنجاح!');
                  location.reload(); // إعادة تحميل الصفحة لعرض الفعالية الجديدة
              } else {
                  // إذا فشل إنشاء الفعالية، عرض رسالة الخطأ
                  alert('حدث خطأ: ' + response.message);
              }
          },
          error: function () {
              // في حالة حدوث خطأ في الاتصال بالخادم
              alert('حدث خطأ أثناء إنشاء الفعالية. يرجى المحاولة مرة أخرى.');
          }
      });
  });
});