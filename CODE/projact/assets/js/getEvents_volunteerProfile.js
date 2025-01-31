$(document).ready(function () {
  // دالة لجلب الفعاليات التي اشترك فيها المتطوع
  function fetchVolunteerEvents() {
    $.ajax({
      type: 'GET',
      url: '../execute/getEvents_volunteerProfile.php', // ملف PHP الذي يسترجع الفعاليات
      dataType: 'json',
      success: function (response) {
        if (response.status === 'success') {
          // إذا تم جلب البيانات بنجاح، نقوم بعرضها
          displayEvents(response.data);
        } else {
          // إذا حدث خطأ، نعرض رسالة خطأ
          console.error('خطأ في الاستجابة:', response.message);
          alert('حدث خطأ أثناء جلب الفعاليات: ' + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error('حدث خطأ في الاتصال بالخادم:', error);
        alert('حدث خطأ في الاتصال بالخادم.');
      }
    });
  }

  // دالة لعرض الفعاليات في الواجهة
  function displayEvents(events) {
    const container = $('#eventsContainer');
    container.empty();

    events.forEach(event => {
        const card = `
            <div class="col-12">
                <div class="card mb-4" style="max-width: 620px; margin: auto;">
                    <div class="card-body">
                        <h5 class="card-title">${event.EventName || 'غير معروف'}</h5>
                        <p class="card-text mb-1"><strong>الوصف:</strong> ${event.eventDescription || 'غير معروف'}</p>
                        <p class="card-text mb-1"><strong>التاريخ:</strong> ${event.eventDate || 'غير معروف'}</p>
                        <img src="${event.eventImage || 'path/to/default/event.jpg'}" class="card-img-top" alt="Event Image" style="height: 220px; object-fit: cover;">
                        <p class="card-text text-success"><strong>تم انضمامك لهذه الفعالية كمتطوع.</strong></p>
                    </div>
                </div>
            </div>
        `;
        container.append(card);
    });
}

  // نستدعي الدالة لجلب الفعاليات عند تحميل الصفحة
  fetchVolunteerEvents();
});