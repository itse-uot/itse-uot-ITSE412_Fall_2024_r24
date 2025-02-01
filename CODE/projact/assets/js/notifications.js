$(document).ready(function () {
    // تحديث حالة الإشعار عند النقر عليه
    $('.notification-item').on('click', function () {
        const notificationID = $(this).data('notification-id');
        $.ajax({
            type: 'POST',
            url: '../execute/update_notification.php',
            data: { notificationID: notificationID },
            success: function (response) {
                if (response.status === 'success') {
                    $(this).addClass('read'); // إضافة كلاس للإشعار المقروء
                }
            },
            error: function (xhr, status, error) {
                console.error('Error updating notification:', error);
            }
        });
    });

    // تحميل الإشعارات تلقائيًا عند فتح الصفحة
    function loadNotifications() {
        $.ajax({
            type: 'GET',
            url: '../execute/notifications.php',
            success: function (response) {
                $('.notifications').html(response); // عرض الإشعارات
            },
            error: function (xhr, status, error) {
                console.error('Error loading notifications:', error);
            }
        });
    }

    // تحميل الإشعارات كل 30 ثانية
    setInterval(loadNotifications, 30000);
});