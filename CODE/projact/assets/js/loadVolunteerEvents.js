// $(document).ready(function () {
//     // دالة لتحميل الفعاليات
//     function loadEvents() {
//       $.ajax({
//         type: 'GET',
//         url: '../execute/getEvents.php', // ملف PHP لاسترجاع البيانات
//         dataType: 'json',
//         success: function (response) {
//           if (response.status === 'success') {
//             // عرض الفعاليات في الواجهة
//             displayEvents(response.data);
//           } else {
//             // عرض رسالة خطأ
//             alert('حدث خطأ أثناء تحميل الفعاليات: ' + response.message);
//           }
//         },
//         error: function () {
//           // في حالة حدوث خطأ في الاتصال بالخادم
//           alert('حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.');
//         }
//       });
//     }
  
//     // دالة لعرض الفعاليات
//     function displayEvents(events) {
//       var eventsContainer = $('#eventsContainer'); // العنصر الذي سيحتوي على البطاقات
//       eventsContainer.empty(); // تفريغ العنصر قبل إضافة البيانات الجديدة
  
//       // إنشاء بطاقة لكل فعالية
//       events.forEach(function (event) {
//         var eventCard = `
//           <div class="card mb-4">
//             <div class="d-flex align-items-center p-3">
//               <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3"
//                 style="width: 50px; height: 50px;">
//               <div>
//                 <h6 class="m-0">${event.OrganizationName}</h6>
//                 <small class="text-muted">${event.StartDate}</small>
//               </div>
//             </div>
//             <img src="${event.Image}" class="card-img-top" alt="Event Image">
//             <div class="card-body">
//               <h5 class="card-title">${event.EventName}</h5>
//               <p class="card-text mb-1"><strong>الوصف:</strong> ${event.Description}</p>
//               <p class="card-text mb-1"><strong>الموقع:</strong> ${event.Location}</p>
//               <p class="card-text mb-1"><strong>التاريخ البداية:</strong> ${event.StartDate}</p>
//               <p class="card-text mb-1"><strong>التاريخ النهاية:</strong> ${event.EndDate}</p>
//               <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> ${event.RequiredSkills}</p>
  
//               <!-- عرض التقييم الإجمالي -->
//               <div class="mt-4">
//                 <h6>التقييم الإجمالي:</h6>
//                 <div class="d-flex align-items-center">
//                   <span class="text-warning fs-5 me-2" id="averageRatingStars">
//                     ★★★★☆
//                   </span>
//                   <strong id="averageRatingValue">(4.2)</strong>
//                 </div>
//                 <p class="text-muted" id="totalRatingsCount">عدد التقييمات: 5</p>
//               </div>
  
//               <div class="d-flex justify-content-between align-items-center mt-3">
//                 <!-- زر إضافة تقييم -->
//                 <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">إضافة تقييم</button>
//                 <!-- زر تقديم طلب -->
//                 <button class="btn btn-outline-secondary btn-sm apply-event-btn" data-event-id="${event.EventID}">تقديم طلب</button>
//               </div>
//             </div>
//           </div>
//         `;
  
//         // إضافة البطاقة إلى العنصر
//         eventsContainer.append(eventCard);
//       });
  
//       // إضافة حدث النقر على زر "تقديم طلب"
//       $('.apply-event-btn').on('click', function () {
//         var eventID = $(this).data('event-id'); // استخراج eventID من الزر
//         applyForEvent(eventID); // استدعاء دالة تقديم الطلب
//       });
//     }
  
//     // دالة لتقديم طلب المشاركة في الفعالية
//     function applyForEvent(eventID) {
//       $.ajax({
//         type: 'POST',
//         url: '../execute/applyForEvent.php', // ملف PHP لتقديم الطلب
//         data: { eventID: eventID },
//         dataType: 'json',
//         success: function (response) {
//           if (response.status === 'success') {
//             // إذا تم تقديم الطلب بنجاح
//             alert('تم تقديم طلب المشاركة بنجاح!');
//           } else {
//             // إذا فشل تقديم الطلب
//             alert('حدث خطأ: ' + response.message);
//           }
//         },
//         error: function () {
//           // في حالة حدوث خطأ في الاتصال بالخادم
//           alert('حدث خطأ أثناء تقديم الطلب. يرجى المحاولة مرة أخرى.');
//         }
//       });
//     }
  
//     // تحميل الفعاليات عند تحميل الصفحة
//     loadEvents();
//   });