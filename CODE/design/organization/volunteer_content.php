<main id="main" class="main">
  <div class="pagetitle">
    <h1>الملف الشخصي للمنظمة</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/img/organization-logo.jpg" alt="Organization Logo" class="rounded-circle">
            <h2>منظمة الأمل الخيرية</h2> <!-- اسم المنظمة -->
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true">معلومات</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false">تعديل البيانات</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <!-- عرض البيانات -->
              <div class="tab-pane fade show active" id="profile-overview">
                <h5 class="card-title">تفاصيل المنظمة</h5>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">اسم المنظمة</div>
                  <div class="col-lg-9 col-md-8">منظمة الأمل الخيرية</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">البريد الإلكتروني</div>
                  <div class="col-lg-9 col-md-8">info@alamal.org</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">رقم الهاتف</div>
                  <div class="col-lg-9 col-md-8">092-12345678</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">المجال</div>
                  <div class="col-lg-9 col-md-8">الرعاية الصحية</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">الموقع</div>
                  <div class="col-lg-9 col-md-8">شارع الأمل، طرابلس، ليبيا</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">الوصف</div>
                  <div class="col-lg-9 col-md-8">منظمة خيرية تعمل على تقديم الرعاية الصحية للأسر المحتاجة في ليبيا.</div>
                </div>
              </div>

              <!-- تعديل البيانات -->
              <div class="tab-pane fade" id="profile-edit">
                <h5 class="card-title">تعديل بيانات المنظمة</h5>
                <form>
                  <div class="row mb-3">
                    <label for="orgName" class="col-md-4 col-lg-3 col-form-label">اسم المنظمة</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="orgName" type="text" class="form-control" id="orgName" value="منظمة الأمل الخيرية">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">البريد الإلكتروني</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="info@alamal.org">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="phone" value="092-12345678">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="field" class="col-md-4 col-lg-3 col-form-label">المجال</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="field" type="text" class="form-control" id="field" value="الرعاية الصحية">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="location" class="col-md-4 col-lg-3 col-form-label">الموقع</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="location" type="text" class="form-control" id="location" value="شارع الأمل، طرابلس، ليبيا">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="description" class="col-md-4 col-lg-3 col-form-label">الوصف</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="description" class="form-control" id="description" rows="4">منظمة خيرية تعمل على تقديم الرعاية الصحية للأسر المحتاجة في ليبيا.</textarea>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- قسم الفعاليات -->
  <div class="container">
    <div class="pagetitle mt-5">
      <h2>الفعاليات الخاصة بالمنظمة</h2>
    </div>
    <div class="row">
      <!-- الفعالية الأولى -->
      <div class="col-12">
        <div class="card mb-4" style="max-width: 620px; margin: auto;">
          <div class="d-flex align-items-center p-2">
            <img src="assets/img/event1.jpg" alt="Event Image" class="rounded-circle me-3" style="width: 50px; height: 50px;">
            <div>
              <h6 class="m-0">حملة التبرع بالدم</h6>
              <small class="text-muted">تاريخ: 2023-09-20</small>
            </div>
          </div>
          <img src="assets/img/event1.jpg" class="card-img-top" alt="Event Image" style="height: 220px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">تفاصيل الفعالية</h5>
            <p class="card-text mb-1"><strong>الوصف:</strong> حملة تهدف إلى جمع التبرعات بالدم لصالح المستشفيات المحلية.</p>
            <p class="card-text mb-1"><strong>المهارات المطلوبة:</strong> التنظيم، التواصل.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
