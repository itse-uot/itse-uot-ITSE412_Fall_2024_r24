<main id="main" class="main">
  <h1>البحث</h1>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">نتائح البحث</h5>

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button"
            role="tab" aria-controls="home" aria-selected="false" tabindex="-1">المتطوعين</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile"
            type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">المنظمات</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-contact"
            type="button" role="tab" aria-controls="contact" aria-selected="true">الفعليات</button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabContent" id="searchResults">
        <div class="tab-pane fade" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
          <div class="card w-100">
            <div class="card-body d-flex align-items-center justify-content-between" style="width: 100%;">

              <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                <img src="assets/img/profile-img.jpg" alt="Volunteer Profile Picture" class="rounded-circle"
                  style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                  <h5 class="card-title mb-0">
                    <a href="volunteer_profileView-for-other.php" class="text-decoration-none text-dark">كيفن
                      اندرسون</a>
                  </h5>
                  <p class="mb-0 text-muted">البريد الإلكتروني: volunteer@example.com</p>
                </div>

              </div>
            </div>
          </div>
          <div class="card w-100">
            <div class="card-body d-flex align-items-center justify-content-between" style="width: 100%;">

              <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                <img src="assets/img/profile-img.jpg" alt="Volunteer Profile Picture" class="rounded-circle"
                  style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                  <h5 class="card-title mb-0">
                    <a href="volunteer_profileView-for-other.php" class="text-decoration-none text-dark">كيفن
                      اندرسون</a>
                  </h5>
                  <p class="mb-0 text-muted">البريد الإلكتروني: volunteer@example.com</p>
                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="card w-100">
            <div class="card-body d-flex align-items-center justify-content-between" style="width: 100%;">

              <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle"
                  style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                  <h5 class="card-title mb-0">
                    <a href="organization_profileView-for-other.php" class="text-decoration-none text-dark">منظمة الأمل
                      الخيرية</a>
                  </h5>
                  <p class="mb-0 text-muted">المجال: الرعاية الصحية</p>
                  <p class="mb-0 text-muted">الموقع: شارع الأمل، طرابلس، ليبيا</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade active show" id="bordered-contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="container">
            <div class="row">
              <!-- العمود الرئيسي للبطاقات -->
              <div class="col-md-9 order-md-1">
                <!-- البطاقة الأولى -->
                <div class="card mb-4">
                  <div class="d-flex align-items-center p-3">
                    <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle me-3"
                      style="width: 50px; height: 50px;">
                    <div>
                      <h6 class="m-0">منظمة السلام الأخضر</h6>
                      <small class="text-muted">25 ديسمبر 2024</small>
                    </div>
                  </div>
                  <img src="assets/img/voluntee.jpeg" class="card-img-top" alt="Event Image">
                  <div class="card-body">
                    <h5 class="card-title">فعالية اليوم المفتوح</h5>
                    <p class="card-text mb-1"><strong>الوصف:</strong> يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة.</p>
                    <p class="card-text mb-1"><strong>الموقع:</strong> المدينة الجامعية</p>
                    <p class="card-text mb-1"><strong>التاريخ البداية:</strong> 25 ديسمبر 2024</p>
                    <p class="card-text mb-1"><strong>التاريخ النهاية:</strong> 30 ديسمبر 2024</p>
                    <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> التواصل، التنظيم، الإدارة</p>

                    <!-- عرض التقييم الإجمالي -->
                    <div class="mt-4">
                      <h6>التقييم الإجمالي:</h6>
                      <div class="d-flex align-items-center">
                        <span class="text-warning fs-5 me-2" id="averageRatingStars">
                          ★★★★☆
                        </span>
                        <strong id="averageRatingValue">(4.2)</strong>
                      </div>
                      <p class="text-muted" id="totalRatingsCount">عدد التقييمات: 5</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">إضافة
                        تقييم</button>
                      <?php
                      include "evaluation_content.php";
                      ?>


                      <button class="btn btn-outline-secondary btn-sm">تقديم طلب</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>

      </div><!-- End Bordered Tabs -->

    </div>
  </div>
</main>
<!-- <script>
$(document).ready(function () {
  $('#searchButton').on('click', function () {
    let query = $('#searchQuery').val().trim();

    if (query === '') {
      alert('يرجى إدخال كلمة البحث');
      return;
    }

    $.ajax({
      url: 'search_volunteer.php',
      type: 'POST',
      data: { query: query },
      dataType: 'json',
      success: function (response) {
        if (response.length > 0) {
          let resultsHTML = '';
          response.forEach(function (volunteer) {
            resultsHTML += `
              <div class="card w-100 mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center" style="gap: 20px;">
                    <img src="${volunteer.image}" alt="Volunteer Picture" class="rounded-circle"
                      style="width: 50px; height: 50px; object-fit: cover;">
                    <div>
                      <h5 class="card-title mb-0">
                        <a href="volunteer_profileView-for-other.php?id=${volunteer.id}" class="text-decoration-none text-dark">
                          ${volunteer.name}
                        </a>
                      </h5>
                      <p class="mb-0 text-muted">البريد الإلكتروني: ${volunteer.email}</p>
                    </div>
                  </div>
                </div>
              </div>
            `;
          });
          $('#searchResults').html(resultsHTML);
        } else {
          $('#searchResults').html('<p class="text-muted">لا توجد نتائج مطابقة.</p>');
        }
      },
      error: function (xhr, status, error) {
        console.error('Error:', error);
        alert('حدث خطأ أثناء البحث. يرجى المحاولة مرة أخرى.');
      }
    });
  });
});
// </script> -->