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

                <li class="nav-item" role="presentation">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab" tabindex="-1">تعديل البيانات </button>
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

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">صورة الملف</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">الاسم الكامل</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="احمد الشريف">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">المهارات</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">مهارات المتطوع</textarea>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="092-0000000">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">البريد الالكتروني</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">حفظ التغيرات</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>





              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


</main>