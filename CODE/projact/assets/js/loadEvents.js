$(document).ready(function () {
  // دالة لتحميل الفعاليات الخاصة بالمنظمة
  function loadOrganizationEvents() {
    $.ajax({
      type: 'GET',
      url: '../execute/events.php', // ملف PHP لاسترجاع الفعاليات
      dataType: 'json',
      success: function (response) {
        console.log(response); // فحص البيانات المسترجعة
        if (response.status === 'success') {
          // عرض الفعاليات في الواجهة
          displayEvents(response.data);
        } else {
          // عرض رسالة خطأ
          alert('حدث خطأ أثناء تحميل الفعاليات: ' + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText); // فحص الخطأ
        alert('حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.');
      }
    });
  }

  // دالة لعرض الفعاليات مع التقييمات
  function displayEvents(events) {
    var eventsContainer = $('#eventsContainer'); // العنصر الذي سيحتوي على البطاقات
    eventsContainer.empty(); // تفريغ العنصر قبل إضافة البيانات الجديدة

    // إنشاء بطاقة لكل فعالية
    events.forEach(function (event) {
      const averageRating = event.AverageRating ? parseFloat(event.AverageRating) : 0;
      const averageRatingFormatted = averageRating.toFixed(1); // تحويل القيمة إلى رقم مع منزلة عشرية واحدة

      var eventCard = `
        <div class="card mb-4">
          <div class="d-flex align-items-center p-3">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3"
              style="width: 50px; height: 50px;">
            <div>
              <h6 class="m-0">${event.OrganizationName}</h6>
              <small class="text-muted">${event.StartDate}</small>
            </div>
            <!-- زر القائمة المنسدلة -->
            <div class="ms-auto">
              <div class="dropdown">
                <button class="btn btn-link text-muted" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i> <!-- أيقونة ثلاث نقاط -->
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editEventModal" data-event-id="${event.EventID}">تعديل</a></li>
                  <li><a class="dropdown-item delete-event-btn" href="#" data-event-id="${event.EventID}">حذف</a></li>
                </ul>
              </div>
            </div>
          </div>
          <img src="${event.Image}" class="card-img-top" alt="Event Image">
          <div class="card-body">
            <h5 class="card-title">${event.EventName}</h5>
            <p class="card-text mb-1"><strong>الوصف:</strong> ${event.Description}</p>
            <p class="card-text mb-1"><strong>الموقع:</strong> ${event.Location}</p>
            <p class="card-text mb-1"><strong>التاريخ البداية:</strong> ${event.StartDate}</p>
            <p class="card-text mb-1"><strong>التاريخ النهاية:</strong> ${event.EndDate}</p>
            <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> ${event.RequiredSkills}</p>

            <!-- عرض التقييم الإجمالي -->
            <div class="mt-4">
              <h6>التقييم الإجمالي:</h6>
              <div class="d-flex align-items-center">
                <span class="text-warning fs-5 me-2">${getStarRating(averageRating)}</span>
                <strong id="averageRatingValue">(${averageRatingFormatted})</strong>
              </div>
              <p class="text-muted" id="totalRatingsCount">عدد التقييمات: ${event.TotalRatings}</p>
            </div>

            <!-- زر عرض التقييمات -->
            <div class="d-flex justify-content-between align-items-center mt-3">
              <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#reviewsModal" data-event-id="${event.EventID}"
                style="width: 160px; height: 40px;">
                عرض التقييمات
              </button>
            </div>
          </div>
        </div>
      `;

      // إضافة البطاقة إلى العنصر
      eventsContainer.append(eventCard);
    });
  }

  // وظيفة لتحويل التقييم إلى نجوم
  function getStarRating(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
      stars += i <= rating ? '★' : '☆';
    }
    return stars;
  }

  // إضافة نافذة عرض التقييمات ديناميكيًا
  function addReviewsModal() {
    const modalHtml = `
      <div class="modal fade" id="reviewsModal" tabindex="-1" aria-labelledby="reviewsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reviewsModalLabel">تقييمات الفعالية</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="reviewsContent">
                <!-- سيتم تحميل التقييمات هنا -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
          </div>
        </div>
      </div>
    `;

    // إضافة الـ Modal إلى body
    $('body').append(modalHtml);
  }

  // إضافة نافذة تعديل الفعالية ديناميكيًا
  function addEditEventModal() {
    const modalHtml = `
      <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editEventModalLabel">تعديل الفعالية</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="editEventForm">
                <!-- Event Name -->
                <div class="mb-3">
                  <label for="editEventName" class="form-label">اسم الفعالية</label>
                  <input type="text" class="form-control" id="editEventName" required>
                </div>

                <!-- Event Start Date -->
                <div class="mb-3">
                  <label for="editEventStartDate" class="form-label">تاريخ البدء</label>
                  <input type="date" class="form-control" id="editEventStartDate" required>
                </div>

                <!-- Event End Date -->
                <div class="mb-3">
                  <label for="editEventEndDate" class="form-label">تاريخ الانتهاء</label>
                  <input type="date" class="form-control" id="editEventEndDate" required>
                </div>

                <!-- Event Location -->
                <div class="mb-3">
                  <label for="editEventLocation" class="form-label">الموقع</label>
                  <input type="text" class="form-control" id="editEventLocation" required>
                </div>

                <!-- Required Skills -->
                <div class="mb-3">
                  <label for="editEventSkills" class="form-label">المهارات المطلوبة</label>
                  <input type="text" class="form-control" id="editEventSkills" required>
                </div>

                <!-- Event Description -->
                <div class="mb-3">
                  <label for="editEventDescription" class="form-label">الوصف</label>
                  <textarea class="form-control" id="editEventDescription" rows="3" required></textarea>
                </div>

                <!-- Event Image -->
                <div class="mb-3">
                  <label for="editEventImage" class="form-label">صورة الفعالية</label>
                  <input type="file" class="form-control" id="editEventImage">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    `;

    // إضافة الـ Modal إلى body
    $('body').append(modalHtml);
  }

  // عند فتح نافذة تعديل الفعالية
  $(document).on('show.bs.modal', '#editEventModal', function (event) {
    const button = $(event.relatedTarget); // الزر الذي فتح النافذة
    const eventID = button.data('event-id'); // استخراج eventID من الزر

    // جلب بيانات الفعالية المحددة
    $.ajax({
      type: 'GET',
      url: '../execute/getEventData.php', // ملف PHP لاسترجاع بيانات الفعالية
      data: { eventID: eventID },
      dataType: 'json',
      success: function (response) {
        console.log(response); // فحص البيانات المسترجعة
        if (response.status === 'success') {
          // تعبئة الحقول ببيانات الفعالية
          $('#editEventName').val(response.data.EventName);
          $('#editEventStartDate').val(response.data.StartDate);
          $('#editEventEndDate').val(response.data.EndDate);
          $('#editEventLocation').val(response.data.Location);
          $('#editEventSkills').val(response.data.RequiredSkills);
          $('#editEventDescription').val(response.data.Description);
        } else {
          alert('حدث خطأ أثناء جلب بيانات الفعالية: ' + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText); // فحص الخطأ
        alert('حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.');
      }
    });
  });

  // عند إرسال نموذج التعديل
  $(document).on('submit', '#editEventForm', function (e) {
    e.preventDefault(); // منع إرسال النموذج بشكل عادي

    // جمع بيانات النموذج
    const eventID = $('#editEventModal').data('event-id'); // استخراج eventID من النافذة
    const formData = new FormData();
    formData.append('eventID', eventID);
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
      url: '../execute/editEvent.php', // ملف PHP لتعديل الفعالية
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        console.log(response); // فحص الاستجابة
        if (response.status === 'success') {
          alert('تم تعديل الفعالية بنجاح!');
          $('#editEventModal').modal('hide'); // إغلاق النافذة
          loadOrganizationEvents(); // إعادة تحميل الفعاليات
        } else {
          alert('حدث خطأ أثناء تعديل الفعالية: ' + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText); // فحص الخطأ
        alert('حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.');
      }
    });
  });

  // إضافة نافذة عرض التقييمات عند تحميل الصفحة
  addReviewsModal();

  // إضافة نافذة تعديل الفعالية عند تحميل الصفحة
  addEditEventModal();

  // تحميل الفعاليات عند تحميل الصفحة
  loadOrganizationEvents();
});