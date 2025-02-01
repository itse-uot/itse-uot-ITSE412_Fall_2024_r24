// ملف event_actions.js
document.addEventListener('DOMContentLoaded', function () {
    // فتح نموذج التعديل عند النقر على زر التعديل
    document.querySelectorAll('.edit-event').forEach(function (button) {
        button.addEventListener('click', function () {
            const eventId = this.getAttribute('data-event-id');
            // جلب بيانات الفعالية باستخدام Ajax
            fetch(`../execute/event_actions_handler.php?action=get_event&eventId=${eventId}`)
                .then(response => response.json())
                .then(data => {
                    // ملء النموذج ببيانات الفعالية
                    document.getElementById('editEventName').value = data.EventName;
                    document.getElementById('editStartDate').value = data.StartDate;
                    document.getElementById('editEndDate').value = data.EndDate;
                    document.getElementById('editLocation').value = data.Location;
                    document.getElementById('editRequiredSkills').value = data.RequiredSkills;
                    document.getElementById('editDescription').value = data.Description;
                })
                .catch(error => console.error('Error fetching event data:', error));
        });
    });

    // حذف الفعالية عند النقر على زر الحذف
    document.querySelectorAll('.delete-event').forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // منع السلوك الافتراضي للرابط
            const eventId = this.getAttribute('data-event-id');
            if (confirm('هل أنت متأكد من حذف هذه الفعالية؟')) {
                fetch(`../execute/event_actions_handler.php?action=delete_event&eventId=${eventId}`, {
                    method: 'POST'
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('تم حذف الفعالية بنجاح');
                            location.reload(); // إعادة تحميل الصفحة لتحديث القائمة
                        } else {
                            alert('حدث خطأ أثناء حذف الفعالية');
                        }
                    })
                    .catch(error => console.error('Error deleting event:', error));
            }
        });
    });

    // إرسال نموذج التعديل باستخدام Ajax
    document.getElementById('editEventForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const eventId = document.querySelector('.edit-event').getAttribute('data-event-id');
        fetch(`../execute/event_actions_handler.php?action=update_event&eventId=${eventId}`, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم تحديث الفعالية بنجاح');
                    location.reload(); // إعادة تحميل الصفحة لتحديث القائمة
                } else {
                    alert('حدث خطأ أثناء تحديث الفعالية');
                }
            })
            .catch(error => console.error('Error updating event:', error));
    });
});