
<main id="main" class="main">

  <div class="pagetitle">
    <h1>الملف الشخصي</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle profileImage" >
            <h2 class="fullName"></h2> <!-- هنا سيتم عرض اسم المتطوع -->
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
              <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" role="tab">تعديل البيانات</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade profile-overview show active" id="profile-overview" role="tabpanel">
                <h5 class="card-title">تفاصيل الملف الشخصي</h5>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">الاسم الكامل</div>
                  <div class="col-lg-9 col-md-8 fullName" ></div> <!-- هنا سيتم عرض الاسم -->
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
                  <div class="col-lg-9 col-md-8 contactNumber" ></div> <!-- هنا سيتم عرض رقم الهاتف -->
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">البريد الالكتروني</div>
                  <div class="col-lg-9 col-md-8 contactEmail" ></div> <!-- هنا سيتم عرض البريد -->
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">المهارات</div>
                  <div class="col-lg-9 col-md-8 skills"></div> <!-- هنا سيتم عرض المهارات -->
                </div>
              </div>
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
              <form id="editProfileForm" enctype="multipart/form-data">
                      <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">صورة الملف</label>
                          <div class="col-md-8 col-lg-9">
                              <img id="profileImagePreview" src="assets/img/default-profile.png" alt="Profile" class="img-fluid rounded-circle mb-2">
                              <div class="pt-2">
                                  <input type="file" class="form-control" name="profileImage" id="profileImage">
                              </div>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="fullName2" class="col-md-4 col-lg-3 col-form-label">الاسم الكامل</label>
                          <div class="col-md-8 col-lg-9">
                              <input name="fullName2" type="text" class="form-control" id="fullName2">
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="about" class="col-md-4 col-lg-3 col-form-label">المهارات</label>
                          <div class="col-md-8 col-lg-9">
                              <textarea name="about" class="form-control" id="about" style="height: 100px"></textarea>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                          <div class="col-md-8 col-lg-9">
                              <input name="phone" type="text" class="form-control" id="Phone">
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">البريد الإلكتروني</label>
                          <div class="col-md-8 col-lg-9">
                              <input name="email" type="email" class="form-control" id="Email">
                          </div>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                      </div>
                  </form>
                </div>
            </div><!-- End Bordered Tabs -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- قسم البطاقات -->
  <div class="container">
    <div class="row">
      <!-- تكرار البطاقات مع عرض 620px -->
      <div class="col-12">
        <div class="card mb-4" style="max-width: 620px; margin: auto;"> <!-- ضبط العرض إلى 620px -->
          <!-- رأس البطاقة -->
          <div class="d-flex align-items-center p-2">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;"> <!-- حجم الصورة -->
            <div>
              <h6 class="m-0">منظمة السلام الأخضر</h6>
              <small class="text-muted">25 ديسمبر 2024</small>
            </div>
          </div>
          <img src="assets/img/voluntee.jpeg" class="card-img-top" alt="Event Image" style="height: 220px; object-fit: cover;"> <!-- ضبط ارتفاع الصورة -->
          <!-- محتوى البطاقة -->
          <div class="card-body">
            <h5 class="card-title">فعالية اليوم المفتوح</h5>
            <p class="card-text mb-1"><strong>الوصف:</strong> يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة.</p>
            <p class="card-text text-success"><strong>لقد انضم لهذه الفعالية كمتطوع.</strong></p>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card mb-4" style="max-width: 620px; margin: auto;"> <!-- ضبط العرض إلى 620px -->
          <!-- رأس البطاقة -->
          <div class="d-flex align-items-center p-2">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;"> <!-- حجم الصورة -->
            <div>
              <h6 class="m-0">منظمة السلام الأخضر</h6>
              <small class="text-muted">25 ديسمبر 2024</small>
            </div>
          </div>
          <img src="assets/img/voluntee.jpeg" class="card-img-top" alt="Event Image" style="height: 220px; object-fit: cover;"> <!-- ضبط ارتفاع الصورة -->
          <!-- محتوى البطاقة -->
          <div class="card-body">
            <h5 class="card-title">فعالية اليوم المفتوح</h5>
            <p class="card-text mb-1"><strong>الوصف:</strong> يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة.</p>
            <p class="card-text text-success"><strong>لقد انضم لهذه الفعالية كمتطوع.</strong></p>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
<!-- <script>
$(document).ready(function () {
    var volunteerId = 1; // رقم المتطوع

    // تحميل البيانات
    function loadProfileData() {
        $.ajax({
            type: 'POST',
            url: '../execute/get_volunteer_data.php',
            data: { action: 'get_data', volunteerId: volunteerId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    var data = response.data;
                    // تحديث البيانات في العرض
                    // $('.fullNametitle').text(data.FullName); // عرض الاسم في الترويسة
                    $('.fullName').text(data.FullName); // عرض الاسم في الحقل
                    $('.skills').text(data.Skills); // عرض المهارات
                    $('.contactNumber').text(data.ContactNumber); // عرض رقم الهاتف
                    $('.contactEmail').text(data.ContactEmail); // عرض البريد

                    // تحديث البيانات في حقول التعديل
                    $('#fullName2').val(data.FullName); // وضع الاسم في حقل التعديل
                    $('#about').val(data.Skills); // وضع المهارات في حقل التعديل
                    $('#Phone').val(data.ContactNumber); // وضع رقم الهاتف في حقل التعديل
                    $('#Email').val(data.ContactEmail); // وضع البريد في حقل التعديل

                    // تعيين الصورة باستخدام Base64
                    $('.profileImage').attr('src', 'data:image/png;base64,' + data.ProfilePicture);
                    $('#profileImagePreview').attr('src', 'data:image/png;base64,' + data.ProfilePicture);
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء تحميل البيانات.');
            }
        });
    }

    // استدعاء التحميل عند فتح الصفحة
    loadProfileData();

    // حفظ التغييرات
    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this); // استخدام FormData لتضمين الصورة
        formData.append('action', 'update_data');
        formData.append('volunteerId', volunteerId);

        $.ajax({
            type: 'POST',
            url: '../execute/update_volunteer_data.php',
            data: formData,
            processData: false, // لا تقم بمعالجة البيانات بشكل عادي
            contentType: false, // لا تقم بتحديد نوع المحتوى (ليتم التعامل مع الـ FormData بشكل صحيح)
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    loadProfileData(); // تحديث البيانات في الحقول
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء حفظ التغييرات.');
            }
        });
    });
});
</script> -->
