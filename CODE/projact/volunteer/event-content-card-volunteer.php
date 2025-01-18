<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>عرض الفعاليات للمتطوع</title>
  <!-- تضمين Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- تضمين أيقونات Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <!-- العمود الرئيسي للبطاقات -->
      <div class="col-md-9 order-md-1" id="eventsContainer">
        <!-- سيتم تحميل البطاقات هنا باستخدام AJAX -->
      </div>
    </div>
  </div>

  <!-- تضمين مكتبة jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- تضمين مكتبة Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- تضمين ملف JavaScript الخاص بتحميل الفعاليات -->
  <script src="../assets/js/loadVolunteerEvents.js"></script>
</body>
</html>