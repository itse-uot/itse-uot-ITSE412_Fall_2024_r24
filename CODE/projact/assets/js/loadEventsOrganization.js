$(document).ready(function () {
    // جلب الفعاليات من قاعدة البيانات
    function loadEvents() {
      $.ajax({
        url: "../execute/loadEventsOrganization.php", // رابط API لجلب الفعاليات
        type: "GET",
        dataType: "json",
        success: function (data) {
          if (data.status === "success") {
            displayEvents(data.events); // عرض الفعاليات
          } else {
            alert("حدث خطأ أثناء جلب الفعاليات.");
          }
        },
        error: function () {
          alert("حدث خطأ في الاتصال بالخادم.");
        },
      });
    }
  
    // عرض الفعاليات في الصفحة
    function displayEvents(events) {
      let eventsContainer = $("#eventsContainer");
      eventsContainer.empty(); // تفريغ المحتوى الحالي
  
      events.forEach((event) => {
        let eventCard = `
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="../uploads/${event.Image}" class="card-img-top" alt="${event.EventName}" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">${event.EventName}</h5>
                <p class="card-text">${event.Description}</p>
                <p class="card-text"><strong>المكان:</strong> ${event.Location}</p>
                <p class="card-text"><strong>التاريخ:</strong> ${event.StartDate} إلى ${event.EndDate}</p>
                <button class="btn btn-primary view-reviews" data-event-id="${event.EventID}">عرض التقييمات</button>
              </div>
            </div>
          </div>
        `;
        eventsContainer.append(eventCard); // إضافة البطاقة إلى الصفحة
      });
  
      // إضافة حدث لعرض التقييمات
      $(".view-reviews").on("click", function () {
        let eventID = $(this).data("event-id");
        loadReviews(eventID); // جلب التقييمات
      });
    }
  
    // جلب التقييمات من قاعدة البيانات
    function loadReviews(eventID) {
      $.ajax({
        url: "../execute/getReviewsOrganization.php", // رابط API لجلب التقييمات
        type: "GET",
        data: { eventID: eventID },
        dataType: "json",
        success: function (data) {
          if (data.status === "success") {
            displayReviews(data.reviews); // عرض التقييمات
          } else {
            alert("حدث خطأ أثناء جلب التقييمات.");
          }
        },
        error: function () {
          alert("حدث خطأ في الاتصال بالخادم.");
        },
      });
    }
  
    // عرض التقييمات في الـ Modal
    function displayReviews(reviews) {
      let reviewsContainer = $("#previousReviews");
      reviewsContainer.empty(); // تفريغ المحتوى الحالي
  
      if (reviews.length > 0) {
        reviews.forEach((review) => {
          let reviewItem = `
            <div class="mb-3">
              <p><strong>التقييم:</strong> ${review.Rating}</p>
              <p><strong>التعليق:</strong> ${review.Comment}</p>
            </div>
          `;
          reviewsContainer.append(reviewItem); // إضافة التقييم إلى الـ Modal
        });
      } else {
        reviewsContainer.append("<p>لا توجد تقييمات حتى الآن.</p>");
      }
  
      // عرض الـ Modal
      $("#reviewModal").modal("show");
    }
  
    // تحميل الفعاليات عند فتح الصفحة
    loadEvents();
  });