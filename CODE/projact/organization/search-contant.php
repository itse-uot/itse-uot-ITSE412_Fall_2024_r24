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
      <div class="tab-content pt-2" id="borderedTabContent">
        <div class="tab-pane fade" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
          <div class="card w-100">
            <div class="card-body d-flex align-items-center justify-content-between" style="width: 100%;">
              <!-- الصورة والنص -->
              <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                <img src="assets/img/profile-img.jpg" alt="Volunteer Profile Picture" class="rounded-circle"
                  style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                  <h5 class="card-title mb-0">
                    <a href="volunteer_profileView-for-other.php" class="text-decoration-none text-dark">كيفن اندرسون</a>
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
              <!-- الصورة والنص -->
              <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
                <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle"
                  style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                  <h5 class="card-title mb-0">
                    <a href="organization_profileView-for-other.php" class="text-decoration-none text-dark">منظمه الامن الخيريه</a>
                  </h5>
                  <p class="mb-0 text-muted">المجال: التعليم</p>
                  <p class="mb-0 text-muted">الموقع: طرابلس، ليبيا</p>
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
                      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">عرض
                        التقيمات</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>

          <!-- Modal لعرض التقييمات فقط -->
          <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reviewModalLabel">التقييمات</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- عرض التقييمات السابقة -->
                  <div class="mb-4">
                    <h6>التقييمات السابقة:</h6>
                    <div id="previousReviews">
                      <div class="mb-3 d-flex align-items-start">
                        <span class="text-warning fs-5 me-2">★★★★★</span>
                        <div>
                          <strong>محمد أحمد</strong>
                          <p class="text-muted mb-0">فعالية رائعة! التنظيم كان ممتازًا.</p>
                        </div>
                      </div>
                      <div class="mb-3 d-flex align-items-start">
                        <span class="text-warning fs-5 me-2">★★★★☆</span>
                        <div>
                          <strong>سارة علي</strong>
                          <p class="text-muted mb-0">أنشطة ممتعة ولكن المكان كان مزدحمًا بعض الشيء.</p>
                        </div>
                      </div>
                      <div class="mb-3 d-flex align-items-start">
                        <span class="text-warning fs-5 me-2">★★★☆☆</span>
                        <div>
                          <strong>أحمد سالم</strong>
                          <p class="text-muted mb-0">تجربة متوسطة، يمكن تحسين التنظيم.</p>
                        </div>
                      </div>
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
<script>
  $(document).ready(function() {
    // تحميل المتطوعين افتراضيًا عند فتح الصفحة
    loadContent('volunteers', '#volunteerResults');

    // الاستماع لتغيير علامات التبويب
    $('[data-bs-toggle="tab"]').on('shown.bs.tab', function(event) {
      const targetId = $(event.target).data('bs-target');

      if (targetId === '#bordered-home') {
        loadContent('volunteers', '#volunteerResults');
      } else if (targetId === '#bordered-profile') {
        loadContent('organizations', '#organizationResults');
      } else if (targetId === '#bordered-contact') {
        loadContent('events', '#eventResults');
      }
    });

    // تحميل البيانات عبر AJAX
    function loadContent(type, containerId) {
      $.ajax({
        url: 'search_handler.php',
        type: 'POST',
        dataType: 'json',
        data: {
          type: type
        },
        success: function(response) {
          if (response.success) {
            // بناء النتائج
            const results = response.data.map(item => {
              return `
                <div class="card w-100 mb-3">
                  <div class="card-body d-flex align-items-center">
                    <img src="${item.image}" alt="Profile Picture" class="rounded-circle"
                      style="width: 50px; height: 50px; object-fit: cover;">
                    <div class="ms-3">
                      <h5 class="card-title">${item.title}</h5>
                      <p class="card-text">${item.description}</p>
                    </div>
                  </div>
                </div>
              `;
            }).join('');
            $(containerId).html(results);
          } else {
            $(containerId).html('<p>لم يتم العثور على بيانات.</p>');
          }
        },
        error: function() {
          $(containerId).html('<p>حدث خطأ أثناء تحميل البيانات.</p>');
        }
      });
    }
  });
</script>