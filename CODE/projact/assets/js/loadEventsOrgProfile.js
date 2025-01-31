
//عرض الفعاليات الخاصة للمنظمة وتعديل الفعاليات 

$(document).ready(function () {
    // جلب الفعاليات الخاصة بالمنظمة
    function loadEvents() {
        const organizationID = 2; // يمكن استبدالها بـ ID المنظمة من الجلسة أو التوكن
        $.ajax({
            url: "../execute/loadEventsOrgProfile.php", // رابط API لجلب الفعاليات
            type: "GET",
            data: { organizationID: organizationID }, // إرسال organizationID كمعامل
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
                        <!-- زر الخيارات في أعلى البطاقة -->
                        <div class="d-flex justify-content-end p-2">
                            <div class="dropdown">
                                <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i> <!-- أيقونة ثلاث نقاط عمودية -->
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item edit-event" href="#" data-event-id="${event.EventID}">تعديل</a></li>
                                    <li><a class="dropdown-item delete-event" href="#" data-event-id="${event.EventID}">حذف</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- صورة الفعالية -->
                        <img src="../uploads/${event.Image}" class="card-img-top" alt="${event.EventName}" style="height: 200px; object-fit: cover;">

                        <!-- تفاصيل الفعالية -->
                        <div class="card-body">
                            <h5 class="card-title">${event.EventName}</h5>
                            <p class="card-text"><strong>الوصف:</strong> ${event.Description}</p>
                            <p class="card-text"><strong>الموقع:</strong> ${event.Location}</p>
                            <p class="card-text"><strong>تاريخ البداية:</strong> ${event.StartDate}</p>
                            <p class="card-text"><strong>تاريخ النهاية:</strong> ${event.EndDate}</p>
                            <p class="card-text"><strong>المهارات المطلوبة:</strong> ${event.RequiredSkills}</p>
                        </div>
                    </div>
                </div>
            `;
            eventsContainer.append(eventCard); // إضافة البطاقة إلى الصفحة
        });

        // إضافة حدث للتعديل
        $(".edit-event").on("click", function (e) {
            e.preventDefault();
            let eventID = $(this).data("event-id");
            editEvent(eventID); // فتح نموذج التعديل
        });

        // إضافة حدث للحذف
        $(".delete-event").on("click", function (e) {
            e.preventDefault();
            let eventID = $(this).data("event-id");
            deleteEvent(eventID); // حذف الفعالية
        });
    }

    // دالة حذف الفعالية
    function deleteEvent(eventID) {
        if (confirm("هل أنت متأكد من حذف هذه الفعالية؟")) {
            $.ajax({
                url: "../execute/deleteEvent.php", // رابط API لحذف الفعالية
                type: "POST",
                data: { eventID: eventID },
                dataType: "json",
                success: function (data) {
                    if (data.status === "success") {
                        alert(data.message); // عرض رسالة النجاح
                        loadEvents(); // إعادة تحميل الفعاليات
                    } else {
                        alert(data.message); // عرض رسالة الخطأ
                    }
                },
                error: function (xhr, status, error) {
                    alert("حدث خطأ في الاتصال بالخادم: " + error); // عرض تفاصيل الخطأ
                },
            });
        }
    }

    // دالة تعديل الفعالية
    // دالة فتح نموذج التعديل
function editEvent(eventID) {
    // جلب بيانات الفعالية من الخادم
    $.ajax({
        url: "../execute/getEventDetails.php", // رابط API لجلب تفاصيل الفعالية
        type: "GET",
        data: { eventID: eventID },
        dataType: "json",
        success: function (data) {
            if (data.status === "success") {
                // ملء النموذج ببيانات الفعالية
                $("#editEventName").val(data.event.EventName);
                $("#editStartDate").val(data.event.StartDate);
                $("#editEndDate").val(data.event.EndDate);
                $("#editLocation").val(data.event.Location);
                $("#editRequiredSkills").val(data.event.RequiredSkills);
                $("#editDescription").val(data.event.Description);

                // فتح النموذج
                $("#editEventModal").modal("show");
            } else {
                alert("حدث خطأ أثناء جلب بيانات الفعالية.");
            }
        },
        error: function () {
            alert("حدث خطأ في الاتصال بالخادم.");
        },
    });
}

// إرسال بيانات التعديل إلى الخادم
$("#editEventForm").on("submit", function (e) {
    e.preventDefault();

    const eventID = $("#editEventForm").data("event-id"); // الحصول على eventID من النموذج
    const formData = new FormData(this); // إنشاء FormData من النموذج

    // إضافة eventID إلى FormData
    formData.append("eventID", eventID);

    // إرسال البيانات إلى الخادم
    $.ajax({
        url: "../execute/editEvent.php", // رابط API لتعديل الفعالية
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            if (data.status === "success") {
                alert(data.message); // عرض رسالة النجاح
                $("#editEventModal").modal("hide"); // إغلاق النموذج
                loadEvents(); // إعادة تحميل الفعاليات
            } else {
                alert(data.message); // عرض رسالة الخطأ
            }
        },
        error: function () {
            alert("حدث خطأ في الاتصال بالخادم.");
        },
    });
});

    // تحميل الفعاليات عند فتح الصفحة
    loadEvents();
});