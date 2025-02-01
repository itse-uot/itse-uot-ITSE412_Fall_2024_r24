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
      <h1>الملف الشخصي للمنظمة</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="assets/img/default-organization.png" alt="Profile" class="rounded-circle profileImage">
              <h2 class="organizationName"></h2> <!-- هنا سيتم عرض اسم المنظمة -->
            </div>
          </div>
        </div>

        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <h5 class="card-title">تفاصيل الملف الشخصي</h5>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">اسم المنظمة</div>
                <div class="col-lg-9 col-md-8 organizationName"></div> <!-- هنا سيتم عرض الاسم -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">البريد الإلكتروني</div>
                <div class="col-lg-9 col-md-8 contactEmail"></div> <!-- هنا سيتم عرض البريد -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
                <div class="col-lg-9 col-md-8 phoneNumber"></div> <!-- هنا سيتم عرض رقم الهاتف -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">المجال</div>
                <div class="col-lg-9 col-md-8 field"></div> <!-- هنا سيتم عرض المجال -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">الموقع</div>
                <div class="col-lg-9 col-md-8 location"></div> <!-- هنا سيتم عرض الموقع -->
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">الوصف</div>
                <div class="col-lg-9 col-md-8 description"></div> <!-- هنا سيتم عرض الوصف -->
              </div>
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
        function loadProfileData() {
            $.ajax({
                type: 'POST',
                url: '../execute/get_organization_data.php',
                data: { action: 'get_data' },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        var data = response.data;
                        $('.organizationName').text(data.OrganizationName);
                        $('.contactEmail').text(data.ContactEmail);
                        $('.phoneNumber').text(data.PhoneNumber);
                        $('.field').text(data.Field);
                        $('.location').text(data.Location);
                        $('.description').text(data.Description);
                        $('.profileImage').attr('src', 'data:image/png;base64,' + data.OrganizationPicture);
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('حدث خطأ أثناء تحميل البيانات.');
                }
            });
        }

        loadProfileData();
    });
  </script>
</body>

</html>