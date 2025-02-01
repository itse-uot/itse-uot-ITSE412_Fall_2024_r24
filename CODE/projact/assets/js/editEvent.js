$(document).ready(function () {
    // عند فتح نافذة التعديل
    $('#editEventModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // الزر الذي فتح النافذة
      var eventID = button.data('event-id'); // استخراج eventID من الزر
  
      // إرسال طلب AJAX لاسترجاع بيانات الفعالية
      $.ajax({
        type: 'GET',
        url: '../execute/getEventData.php', // ملف لاسترجاع بيانات الفعالية
        data: { eventID: eventID },
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            // تعبئة الحقول بالبيانات المسترجعة
            $('#editEventID').val(response.data.EventID); // حقل مخفي لتخزين eventID
            $('#editEventName').val(response.data.EventName);
            $('#editEventStartDate').val(response.data.StartDate);
            $('#editEventEndDate').val(response.data.EndDate);
            $('#editEventLocation').val(response.data.Location);
            $('#editEventSkills').val(response.data.RequiredSkills);
            $('#editEventDescription').val(response.data.Description);
          } else {
            // إذا فشل استرجاع البيانات
            alert('حدث خطأ أثناء استرجاع بيانات الفعالية: ' + response.message);
          }
        },
        error: function () {
          // في حالة حدوث خطأ في الاتصال بالخادم
          alert('حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.');
        }
      });
    });
  
    // عند إرسال النموذج
    $('#editEventForm').on('submit', function (e) {
      e.preventDefault(); // منع إرسال النموذج بشكل عادي
  
      // جمع بيانات النموذج
      var formData = new FormData();
      formData.append('eventID', $('#editEventID').val()); // إضافة eventID
      formData.append('eventName', $('#editEventName').val());
      formData.append('eventStartDate', $('#editEventStartDate').val());
      formData.append('eventEndDate', $('#editEventEndDate').val());
      formData.append('eventLocation', $('#editEventLocation').val());
      formData.append('eventSkills', $('#editEventSkills').val());
      formData.append('eventDescription', $('#editEventDescription').val());
      formData.append('eventImage', $('#editEventImage')[0].files[0]);
  
      // إرسال البيانات عبر AJAX
      $.ajax({
        type: 'POST',
        url: '../execute/editEvent.php', // ملف التنفيذي
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            // إذا تم التعديل بنجاح، إعادة تحميل الصفحة أو عرض رسالة نجاح
            alert('تم تعديل الفعالية بنجاح!');
            location.reload(); // إعادة تحميل الصفحة لعرض التعديلات
          } else {
            // إذا فشل التعديل، عرض رسالة الخطأ
            alert('حدث خطأ: ' + response.message);
          }
        },
        error: function () {
          // في حالة حدوث خطأ في الاتصال بالخادم
          alert('حدث خطأ أثناء تعديل الفعالية. يرجى المحاولة مرة أخرى.');
        }
      });
    });
  });