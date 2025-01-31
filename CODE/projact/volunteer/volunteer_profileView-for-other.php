<!DOCTYPE html>

<?php
include "head.php";

?>


<body>

  <?php
  include "header.php";
  include "sidebar.php";
  ?>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>الملف الشخصي</h1>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle profileImage">
          <h2 class="fullName2"></h2> <!-- هنا سيتم عرض اسم المتطوع -->
        </div>
      </div>
    </div>

    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">معلومات</button>
            </li>
          </ul>
          <div class="tab-content pt-2">
            <div class="tab-pane fade profile-overview show active" id="profile-overview" role="tabpanel">
              <h5 class="card-title">تفاصيل الملف الشخصي</h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">الاسم الكامل</div>
                <div class="col-lg-9 col-md-8 fullName2"></div> <!-- هنا سيتم عرض الاسم -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
                <div class="col-lg-9 col-md-8 contactNumber"></div> <!-- هنا سيتم عرض رقم الهاتف -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
                <div class="col-lg-9 col-md-8 contactEmail"></div> <!-- هنا سيتم عرض البريد -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">المهارات</div>
                <div class="col-lg-9 col-md-8 skills"></div> <!-- هنا سيتم عرض المهارات -->
              </div>
            </div>
          </div><!-- End Bordered Tabs -->
        </div>
      </div>
    </div>
  </div>
</section>
</main>

  <?php
  include "footer.php";
  include "tail.php";
  ?>
<script>
$(document).ready(function () {
  // رقم المتطوع
  // const urlParams = new URLSearchParams(window.location.search);
  //   const volunteerId = urlParams.get('id');
  const urlParams = new URLSearchParams(window.location.search);
    const volunteerId = urlParams.get('id');

    // تحميل البيانات
    function loadProfileData() {
        $.ajax({
            type: 'POST',
            url: '../execute/get_volunteer_data.php',
            data: { action: 'get_data', volunteerId},
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    var data = response.data;
                    // تحديث البيانات في العرض
                    // $('.fullNametitle').text(data.FullName); // عرض الاسم في الترويسة
                    $('.fullName2').text(data.FullName); // عرض الاسم في الحقل
                    $('.skills').text(data.Skills); // عرض المهارات
                    $('.contactNumber').text(data.ContactNumber); // عرض رقم الهاتف
                    $('.contactEmail').text(data.ContactEmail); // عرض البريد

                    // تحديث البيانات في حقول التع
                } else {
                    alert(response.message);
                }
            },
            error: function () {
               // alert('حدث خطأ أثناء تحميل البيانات.');
            }
        });
    }

    // استدعاء التحميل عند فتح الصفحة
    loadProfileData();

    // حفظ التغييرات
  
});
</script>
</body>

</html>