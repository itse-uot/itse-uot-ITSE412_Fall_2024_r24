$(document).ready(function () {
    // عند النقر على زر الحذف
    $('.delete-event-btn').on('click', function () {
      var eventID = $(this).data('event-id'); // استخراج eventID من الزر
  
      // عرض تنبيه لتأكيد الحذف
      if (confirm('هل أنت متأكد من أنك تريد حذف هذه الفعالية؟')) {
        // إرسال طلب AJAX لحذف الفعالية
        $.ajax({
          type: 'POST',
          url: '../execute/deleteEvent.php', // ملف التنفيذي
          data: { eventID: eventID },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              // إذا تم الحذف بنجاح، إعادة تحميل الصفحة أو عرض رسالة نجاح
              alert('تم حذف الفعالية بنجاح!');
              location.reload(); // إعادة تحميل الصفحة لعرض التغييرات
            } else {
              // إذا فشل الحذف، عرض رسالة الخطأ
              alert('حدث خطأ: ' + response.message);
            }
          },
          error: function () {
            // في حالة حدوث خطأ في الاتصال بالخادم
            alert('حدث خطأ أثناء حذف الفعالية. يرجى المحاولة مرة أخرى.');
          }
        });
      }
    });
  });