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
      // التحقق من أن event.AverageRating رقم قبل استخدام .toFixed()
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
  
            <!-- عرض التقييمات السابقة -->
            <div class="mt-4">
              <h6>التقييمات السابقة:</h6>
              <div id="previousReviews-${event.EventID}">
                <!-- سيتم تحميل التقييمات هنا -->
              </div>
            </div>
  
            <div class="d-flex justify-content-between align-items-center mt-3">
              <!-- زر أزرق -->
              <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#reviewModal" data-event-id="${event.EventID}"
                style="width: 120px; height: 40px;">
                إضافة تقييم
              </button>
            </div>
          </div>
        </div>
      `;
  
      // إضافة البطاقة إلى العنصر
      eventsContainer.append(eventCard);
  
      // تحميل التقييمات الخاصة بالفعالية
      loadPreviousReviews(event.EventID);
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

  // وظيفة لجلب التقييمات السابقة
  function loadPreviousReviews(eventID) {
    $.ajax({
      type: 'GET',
      url: '../execute/review_operations2.php',
      data: { eventID: eventID },
      dataType: 'json',
      success: function (response) {
        console.log(response); // فحص البيانات المسترجعة
        if (response.status === 'success') {
          let reviewsHtml = '';
          response.reviews.forEach(review => {
            reviewsHtml += `
              <div class="mb-3 d-flex align-items-start">
                <span class="text-warning fs-5 me-2">${getStarRating(review.Rating)}</span>
                <div>
                  <strong>${review.ReviewText}</strong>
                  <p class="text-muted mb-0">${review.CreatedAt}</p>
                </div>
              </div>
            `;
          });
          $(`#previousReviews-${eventID}`).html(reviewsHtml);
        } else {
          $(`#previousReviews-${eventID}`).html('<p>لا توجد تقييمات سابقة.</p>');
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText); // فحص الخطأ
        $(`#previousReviews-${eventID}`).html('<p>حدث خطأ أثناء جلب التقييمات.</p>');
      }
    });
  }

  // تحميل الفعاليات عند تحميل الصفحة
  loadOrganizationEvents();
});