<main id="main" class="main">
  <div class="pagetitle">
    <h1>الملف الشخصي للمنظمة</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/img/prof.jpeg" alt="Organization Logo" class="rounded-circle">
            <h2>منظمة الأمل الخيرية</h2> <!-- اسم المنظمة -->
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                  aria-selected="true">معلومات</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false">تعديل
                  البيانات</button>
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
                  <div class="col-lg-9 col-md-8">منظمة خيرية تعمل على تقديم الرعاية الصحية للأسر المحتاجة في ليبيا.
                  </div>
                </div>
              </div>

              <!-- تعديل البيانات -->
              <div class="tab-pane fade" id="profile-edit">
                <h5 class="card-title">تعديل بيانات المنظمة</h5>
                <form class="row g-3">
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">اسم المنظمة (Organization Name)</label>
                    <input type="text" class="form-control" id="inputNanme4" placeholder="منظمة الأمل الخيرية">
                  </div>
                  <div class="mb-3">
                    <label for="inputDescription" class="form-label">وصف المنظمة (Organization Description)</label>
                    <textarea class="form-control" id="inputDescription" style="height: 100px"
                      placeholder="جمعية خيرية تعمل على دعم المجتمعات المحتاجة وتعزيز التنمية المستدامة."></textarea>
                  </div>
                  <!-- قائمة اختبار المجال -->
                  <div class="mb-3">
                    <label class="form-label">المجال (Field)</label>
                    <select class="form-select" aria-label="Default select example">
                      <option disabled>اختر المجال</option>
                      <option value="education">التعليم</option>
                      <option value="health">الصحة</option>
                      <option value="environment">البيئة</option>
                      <option value="social_services">الخدمات الاجتماعية</option>
                      <option value="technology">التكنولوجيا</option>
                      <option value="art_culture">الفن والثقافة</option>
                      <option value="sports">الرياضة</option>
                      <option value="human_rights">حقوق الإنسان</option>
                      <option value="disaster_relief">الإغاثة في حالات الكوارث</option>
                      <option value="animal_welfare">رعاية الحيوان</option>
                      <option value="community_development" selected>تنمية المجتمع</option>
                      <option value="youth">الشباب</option>
                      <option value="elderly_care">رعاية المسنين</option>
                      <option value="mental_health">الصحة النفسية</option>
                      <option value="housing">الإسكان</option>
                      <option value="advocacy">الدعوة والتوعية</option>
                      <option value="refugee_support">دعم اللاجئين</option>
                      <option value="entrepreneurship">ريادة الأعمال</option>
                      <option value="food_security">الأمن الغذائي</option>
                      <option value="education_technology">تكنولوجيا التعليم</option>
                      <option value="water_sanitation">المياه والصرف الصحي</option>
                      <option value="peacebuilding">بناء السلام</option>
                      <option value="research_innovation">البحث والابتكار</option>
                      <option value="employment">التوظيف</option>
                      <option value="women_empowerment">تمكين المرأة</option>
                      <option value="children_rights">حقوق الأطفال</option>
                      <option value="disabilities_support">دعم ذوي الإعاقة</option>
                      <option value="cultural_heritage">التراث الثقافي</option>
                      <option value="energy">الطاقة</option>
                      <option value="transportation">النقل</option>
                      <option value="public_policy">السياسات العامة</option>
                      <option value="volunteering">التطوع العام</option>
                      <option value="other">غير ذلك</option>
                    </select>
                  </div>
                  <!-- انتهاء قائمة اختبار المجال -->
                  <div class="col-12">
                    <label for="inputAddress5" class="form-label">الموقع (Location)</label>
                    <input type="text" class="form-control" id="inputAddress5" placeholder="طرابلس، ليبيا">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">البريد الإلكتروني للتواصل (Contact Email)</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="info@hopecharity.org">
                  </div>
                  <div class="mb-3">
                    <label for="inputPhone" class="form-label">رقم الهاتف للتواصل (Phone Number)</label>
                    <input type="tel" id="inputPhone" class="form-control" required
                      pattern="^(092|093|091|094)[0-9]{7}$" placeholder="0911234567"
                      oninvalid="this.setCustomValidity('الرجاء إدخال رقم هاتف صحيح يبدأ بـ 092, 093, 091، أو 094 ويليه 7 أرقام.')"
                      oninput="this.setCustomValidity('')">
                    <div class="invalid-feedback">الرجاء إدخال رقم هاتف صحيح يبدأ بـ 092, 093, 091، أو 094 ويليه 7
                      أرقام.</div>
                  </div>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">الصورة التعريفية (Profile Picture)</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                    <button type="reset" class="btn btn-secondary">إفراغ</button>
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
    <div class="row" id="eventsContainer">
        <!-- البطاقة الأولى -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- زر الخيارات في أعلى البطاقة -->
                <div class="d-flex justify-content-end p-2">
                    <div class="dropdown">
                        <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> <!-- أيقونة ثلاث نقاط عمودية -->
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item edit-event" href="#" data-event-id="1">تعديل</a></li>
                            <li><a class="dropdown-item delete-event" href="#" data-event-id="1">حذف</a></li>
                        </ul>
                    </div>
                </div>

                <!-- صورة الفعالية -->
                <img src="../uploads/event1.jpg" class="card-img-top" alt="Tree Planting Day" style="height: 200px; object-fit: cover;">

                <!-- تفاصيل الفعالية -->
                <div class="card-body">
                    <h5 class="card-title">Tree Planting Day</h5>
                    <p class="card-text"><strong>الوصف:</strong> Join us to plant trees and make the city greener!</p>
                    <p class="card-text"><strong>الموقع:</strong> Central Park, NY</p>
                    <p class="card-text"><strong>تاريخ البداية:</strong> 2025-03-15</p>
                    <p class="card-text"><strong>تاريخ النهاية:</strong> 2025-03-15</p>
                    <p class="card-text"><strong>المهارات المطلوبة:</strong> Gardening, Teamwork</p>
                </div>
            </div>
        </div>

        <!-- البطاقة الثانية -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- زر الخيارات في أعلى البطاقة -->
                <div class="d-flex justify-content-end p-2">
                    <div class="dropdown">
                        <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> <!-- أيقونة ثلاث نقاط عمودية -->
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item edit-event" href="#" data-event-id="2">تعديل</a></li>
                            <li><a class="dropdown-item delete-event" href="#" data-event-id="2">حذف</a></li>
                        </ul>
                    </div>
                </div>

                <!-- صورة الفعالية -->
                <img src="../uploads/event2.jpg" class="card-img-top" alt="Food Drive" style="height: 200px; object-fit: cover;">

                <!-- تفاصيل الفعالية -->
                <div class="card-body">
                    <h5 class="card-title">Food Drive</h5>
                    <p class="card-text"><strong>الوصف:</strong> Help collect and distribute food to those in need.</p>
                    <p class="card-text"><strong>الموقع:</strong> London, UK</p>
                    <p class="card-text"><strong>تاريخ البداية:</strong> 2025-04-10</p>
                    <p class="card-text"><strong>تاريخ النهاية:</strong> 2025-04-12</p>
                    <p class="card-text"><strong>المهارات المطلوبة:</strong> Logistics, Communication</p>
                </div>
            </div>
        </div>

        <!-- البطاقة الثالثة -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- زر الخيارات في أعلى البطاقة -->
                <div class="d-flex justify-content-end p-2">
                    <div class="dropdown">
                        <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i> <!-- أيقونة ثلاث نقاط عمودية -->
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item edit-event" href="#" data-event-id="3">تعديل</a></li>
                            <li><a class="dropdown-item delete-event" href="#" data-event-id="3">حذف</a></li>
                        </ul>
                    </div>
                </div>

                <!-- صورة الفعالية -->
                <img src="../uploads/event3.jpg" class="card-img-top" alt="Coding Workshop" style="height: 200px; object-fit: cover;">

                <!-- تفاصيل الفعالية -->
                <div class="card-body">
                    <h5 class="card-title">Coding Workshop</h5>
                    <p class="card-text"><strong>الوصف:</strong> Teach kids the basics of coding.</p>
                    <p class="card-text"><strong>الموقع:</strong> San Francisco, USA</p>
                    <p class="card-text"><strong>تاريخ البداية:</strong> 2025-05-20</p>
                    <p class="card-text"><strong>تاريخ النهاية:</strong> 2025-05-21</p>
                    <p class="card-text"><strong>المهارات المطلوبة:</strong> Teaching, Programming</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- نموذج تعديل الفعالية -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">تعديل الفعالية</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
                    <!-- Event Name -->
                    <div class="mb-3">
                        <label for="editEventName" class="form-label">اسم الفعالية</label>
                        <input type="text" class="form-control" id="editEventName" name="eventName" required>
                    </div>

                    <!-- Event Start Date -->
                    <div class="mb-3">
                        <label for="editStartDate" class="form-label">تاريخ البداية</label>
                        <input type="date" class="form-control" id="editStartDate" name="startDate" required>
                    </div>

                    <!-- Event End Date -->
                    <div class="mb-3">
                        <label for="editEndDate" class="form-label">تاريخ النهاية</label>
                        <input type="date" class="form-control" id="editEndDate" name="endDate" required>
                    </div>

                    <!-- Event Location -->
                    <div class="mb-3">
                        <label for="editLocation" class="form-label">الموقع</label>
                        <input type="text" class="form-control" id="editLocation" name="location" required>
                    </div>

                    <!-- Required Skills -->
                    <div class="mb-3">
                        <label for="editRequiredSkills" class="form-label">المهارات المطلوبة</label>
                        <input type="text" class="form-control" id="editRequiredSkills" name="requiredSkills" required>
                    </div>

                    <!-- Event Description -->
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">وصف الفعالية</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                    </div>

                    <!-- Event Image -->
                    <div class="mb-3">
                        <label for="editEventImage" class="form-label">صورة الفعالية</label>
                        <input type="file" class="form-control" id="editEventImage" name="eventImage" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

<!-- تضمين ملف JavaScript -->
<script src="../assets/js/loadEventsOrgProfile.js"></script>
<script src="../assets/js/event.js"></script>
<script src="../assets/js/loadEventsOrgProfile.js"></script>
<script src="../assets/js/deleteEvent.js"></script>