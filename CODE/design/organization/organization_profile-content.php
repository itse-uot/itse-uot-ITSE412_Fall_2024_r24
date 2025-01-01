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

                <!-- Vertical Form -->



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

      <!--بداية الاضافة يعني كودها كامل -->
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

        <!--الان تم الدف الرئيس ليلفي الايفينت-->
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
                      <input type="text" class="form-control" id="eventLocation" placeholder="أدخل موقع الفعالية"
                        required>
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

        <!--نهاية اضافة الفاعلية -->
        <?php

        include "event-content-card-organization-owner.php";


        ?>



      </div>
    </div>
    
</main>