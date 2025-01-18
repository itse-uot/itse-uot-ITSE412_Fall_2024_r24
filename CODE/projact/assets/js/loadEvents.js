$(document).ready(function () {
    // دالة لتحميل الفعاليات
    function loadEvents() {
      $.ajax({
        type: 'GET',
        url: '../execute/getEvents.php', // ملف PHP لاسترجاع البيانات
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            // عرض الفعاليات في الواجهة
            displayEvents(response.data);
          } else {
            // عرض رسالة خطأ
            alert('حدث خطأ أثناء تحميل الفعاليات: ' + response.message);
          }
        },
        error: function () {
          // في حالة حدوث خطأ في الاتصال بالخادم
          alert('حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.');
        }
      });
    }
  
    // دالة لعرض الفعاليات
    function displayEvents(events) {
      var eventsContainer = $('#eventsContainer'); // العنصر الذي سيحتوي على البطاقات
      eventsContainer.empty(); // تفريغ العنصر قبل إضافة البيانات الجديدة
  
      // إنشاء بطاقة لكل فعالية
      events.forEach(function (event) {
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
                  <span class="text-warning fs-5 me-2" id="averageRatingStars">
                    ★★★★☆
                  </span>
                  <strong id="averageRatingValue">(4.2)</strong>
                </div>
                <p class="text-muted" id="totalRatingsCount">عدد التقييمات: 5</p>
              </div>
  
              <div class="d-flex justify-content-between align-items-center mt-3">
                <!-- زر عرض التقييمات -->
                <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#reviewModal"
                  style="width: 120px; height: 40px;">
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
  
    // تحميل الفعاليات عند تحميل الصفحة
    loadEvents();
  });