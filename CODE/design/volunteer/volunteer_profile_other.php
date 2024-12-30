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
<h1>وظيفه المتطوعين</h1>
    <div class="pagetitle" >
      <h1>الملف الشخصي</h1>

    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>الاسم</h2>


            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                <li class="nav-item" role="presentation">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="false" role="tab" fdprocessedid="609t1o" tabindex="-1">معلومات</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade profile-overview show active" id="profile-overview" role="tabpanel">
                  <h5 class="card-title">المهارات</h5>
                  <p class="small fst-italic">مهارات المتطوع</p>

                  <h5 class="card-title">تفاصيل الملف الشخصي</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">الاسم الكامل</div>
                    <div class="col-lg-9 col-md-8">احمد الشريف</div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">رقم الهاتف </div>
                    <div class="col-lg-9 col-md-8">092-00000000</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">البريد الاكتروني</div>
                    <div class="col-lg-9 col-md-8">k.anderson@gamil.com</div>
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


</body>

</html>