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
              <!-- الصورة والنص -->
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
          <?php

          include "event-content-card-volunteer.php";
          include "event-content-card-volunteer.php";
          include "event-content-card-volunteer.php";

          ?>

        </div>
      </div><!-- End Bordered Tabs -->

    </div>
  </div>
</main>