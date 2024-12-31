<main id="main" class="main">
<div class="card-body">
    <br>
<span class="badge bg-primary fs-5">
  <i class="bi bi-plus-circle-fill me-2"></i> إنشاء فعالية
</span>
    <!-- Form for Event Management -->
  <form>
    <!-- Event Name -->
    <div class="row mb-3">
      <label for="eventName" class="col-sm-2 col-form-label">اسم الفعالية</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="eventName" placeholder="أدخل اسم الفعالية" required>
      </div>
    </div>

    <!-- Event Start Date -->
    <div class="row mb-3">
      <label for="eventStartDate" class="col-sm-2 col-form-label">تاريخ بداية الفعالية</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="eventStartDate" required>
      </div>
    </div>

    <!-- Event End Date -->
    <div class="row mb-3">
      <label for="eventEndDate" class="col-sm-2 col-form-label">تاريخ نهاية الفعالية</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="eventEndDate" required>
      </div>
    </div>

    <!-- Event Location -->
    <div class="row mb-3">
      <label for="eventLocation" class="col-sm-2 col-form-label">موقع الفعالية</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="eventLocation" placeholder="أدخل موقع الفعالية" required>
      </div>
    </div>

    <!-- Required Skills -->
    <div class="row mb-3">
      <label for="eventSkills" class="col-sm-2 col-form-label">المهارات المطلوبة</label>
      <div class="col-sm-10">
        <select class="form-select" id="eventSkills" multiple aria-label="المهارات المطلوبة" required>
          <option value="teamwork">العمل الجماعي</option>
          <option value="communication">التواصل الفعّال</option>
          <option value="problem-solving">حل المشكلات</option>
          <option value="event-management">إدارة الفعاليات</option>
          <option value="first-aid">الإسعافات الأولية</option>
        </select>
      </div>
    </div>

    <!-- Event Description -->
    <div class="row mb-3">
      <label for="eventDescription" class="col-sm-2 col-form-label">وصف الفعالية</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="eventDescription" style="height: 100px" placeholder="أدخل وصف الفعالية" required></textarea>
      </div>
    </div>

    <!-- Event Image -->
    <div class="row mb-3">
      <label for="eventImage" class="col-sm-2 col-form-label">صورة وصفية</label>
      <div class="col-sm-10">
        <input class="form-control" type="file" id="eventImage" accept="image/*" required>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2">
        <button type="submit" class="btn btn-primary">حفظ الفعالية</button>
      </div>
    </div>
  </form>
</div>
</main>