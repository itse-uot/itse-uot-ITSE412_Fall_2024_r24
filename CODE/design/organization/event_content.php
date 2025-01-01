<main id="main" class="main">

  <!--بداية الوضيفة متع الفاعليات-->
  <!-- الكارد لإنشاء الفاعلية -->
  <div class="card shadow-sm rounded p-3">
    <div class="d-flex align-items-center">
      <!-- صورة الملف الشخصي -->
      <img src="assets/img/prof.jpeg" class="rounded-circle me-3" alt="Profile Picture"
        style="width: 50px; height: 50px; object-fit: cover;">
      <!-- حقل الإدخال -->
      <input type="text" class="form-control rounded-pill" placeholder="اضغط لإنشاء فاعلية" readonly
        data-bs-toggle="modal" data-bs-target="#eventModal" style="height: 50px;">
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
          <form>
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

  <!--بداية الوضيفة متع الفاعليات-->

</main>