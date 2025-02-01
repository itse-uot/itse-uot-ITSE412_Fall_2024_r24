<main id="main" class="main">
  <div class="pagetitle">
    <h1>الملف الشخصي للمنظمة</h1>
  </div><!-- End Page Title -->


  <section class="section profile">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/img/default-organization.png" alt="Profile" class="rounded-circle profileImage">
            <h2 class="organizationName"></h2> <!-- هنا سيتم عرض اسم المنظمة -->
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
              <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                <form id="editOrganizationForm" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">صورة الملف</label>
                    <div class="col-md-8 col-lg-9">
                      <img id="profileImagePreview" src="assets/img/default-organization.png" alt="Profile" class="img-fluid rounded-circle mb-2">
                      <div class="pt-2">
                        <input type="file" class="form-control" name="profileImage" id="profileImage">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="organizationName" class="col-md-4 col-lg-3 col-form-label">اسم المنظمة</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="organizationName" type="text" class="form-control" id="organizationName">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="description" class="col-md-4 col-lg-3 col-form-label">الوصف</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="description" class="form-control" id="description" style="height: 100px"></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="field" class="col-md-4 col-lg-3 col-form-label">المجال</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="field" type="text" class="form-control" id="field">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="location" class="col-md-4 col-lg-3 col-form-label">الموقع</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="location" type="text" class="form-control" id="location">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="contactEmail" class="col-md-4 col-lg-3 col-form-label">البريد الإلكتروني</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="contactEmail" type="email" class="form-control" id="contactEmail">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="phoneNumber" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phoneNumber" type="text" class="form-control" id="phoneNumber">
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

  <!-- قسم الفعاليات -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4" style="max-width: 720px; margin: auto;">
          <div class="d-flex align-items-center p-3">
            <img src="assets/img/prof.jpeg" alt="Profile Picture" class="rounded-circle me-3"
              style="width: 50px; height: 50px;">
            <input type="text" class="form-control rounded-pill" placeholder="اضغط لإنشاء فاعلية" readonly
              data-bs-toggle="modal" data-bs-target="#eventModal" style="height: 50px; flex-grow: 1;">
          </div>
        </div>
      </div>

      <!-- المودال -->
      <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="eventModalLabel">إنشاء فاعلية جديدة</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Form for Event Management -->
              <form id="eventForm">
                <!-- Event Name -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventName" class="form-label">اسم الفعالية</label>
                    <input type="text" class="form-control" id="eventName" placeholder="أدخل اسم الفعالية" required>
                  </div>
                </div>

                <!-- Event Start Date -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventStartDate" class="form-label">تاريخ بداية الفعالية</label>
                    <input type="date" class="form-control" id="eventStartDate" required>
                  </div>
                </div>

                <!-- Event End Date -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventEndDate" class="form-label">تاريخ نهاية الفعالية</label>
                    <input type="date" class="form-control" id="eventEndDate" required>
                  </div>
                </div>

                <!-- Event Location -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventLocation" class="form-label">موقع الفعالية</label>
                    <input type="text" class="form-control" id="eventLocation" placeholder="أدخل موقع الفعالية" required>
                  </div>
                </div>

                <!-- Required Skills -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventSkills" class="form-label">المهارات المطلوبة</label>
                    <input type="text" class="form-control" id="eventSkills"
                      placeholder="أدخل المهارات المطلوبة (مفصولة بفاصلة)" required>
                  </div>
                </div>

                <!-- Event Description -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventDescription" class="form-label">وصف الفعالية</label>
                    <textarea class="form-control" id="eventDescription" style="height: 100px"
                      placeholder="أدخل وصف الفعالية" required></textarea>
                  </div>
                </div>

                <!-- Event Image -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label for="eventImage" class="form-label">صورة وصفية</label>
                    <input class="form-control" type="file" id="eventImage" accept="image/*" required>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">حفظ الفعالية</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- عرض الفعاليات -->
      <div class="container">
        <div class="row">
          <!-- العمود الرئيسي للبطاقات -->
          <div class="col-md-9 order-md-1" id="eventsContainer">
            <!-- سيتم عرض الفعاليات هنا -->
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- تضمين ملف JavaScript -->
<script src="../assets/js/event.js"></script>
<script src="../assets/js/editEvent.js"></script>
<script src="../assets/js/deleteEvent.js"></script>
<script src="../assets/js/loadEvents.js"></script>

