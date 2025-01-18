<?php
session_start(); // بدء الجلسة

// تدمير الجلسة
session_unset(); // إزالة جميع المتغيرات من الجلسة
session_destroy(); // تدمير الجلسة

// توجيه المستخدم إلى صفحة تسجيل الدخول
header('Location: ../volunteer/login.php');
exit;
?>