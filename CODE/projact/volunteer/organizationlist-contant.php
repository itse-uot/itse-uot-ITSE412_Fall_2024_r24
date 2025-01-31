<main id="main" class="main">
  <h1>إدارة المنظمات</h1>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">المنظمات</h5>

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">منظماتي</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">إنشاء</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="borderedTabContent">
        <!-- Tab 1: عرض المنظمات -->
        <div class="tab-pane fade active show" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
          <div id="organizationsContainer" class="row">
            <!-- سيتم ملء هذا القسم عبر AJAX -->
            <div class="col-12">
              <div class="alert alert-info text-center">جارٍ تحميل المنظمات...</div>
            </div>
          </div>
        </div>

        <!-- Tab 2: إنشاء منظمة -->
        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">إنشاء منظمة</h5>

              <!-- Vertical Form -->
              <form class="row g-3" id="createOrganizationForm" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="organizationName" class="form-label">اسم المنظمة</label>
                  <input type="text" class="form-control" id="organizationName" name="organizationName" required>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">وصف المنظمة</label>
                  <textarea class="form-control" id="description" name="description" style="height: 100px" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="field" class="form-label">المجال</label>
                  <select class="form-select" id="field" name="field" required>
                    <option selected="" disabled>اختر المجال</option>
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
                    <option value="community_development">تنمية المجتمع</option>
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
                    <option value="other">غير ذالك</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="location" class="form-label">الموقع</label>
                  <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="col-12">
                  <label for="contactEmail" class="form-label">البريد الإلكتروني للتواصل</label>
                  <input type="email" class="form-control" id="contactEmail" name="contactEmail" required>
                </div>
                <div class="mb-3">
                  <label for="phoneNumber" class="form-label">رقم الهاتف للتواصل</label>
                  <input type="tel" id="phoneNumber" class="form-control" name="phoneNumber" required pattern="^(092|093|091|094)[0-9]{7}$" oninvalid="this.setCustomValidity('الرجاء إدخال رقم هاتف صحيح يبدأ بـ 092, 093, 091, أو 094 ويليه 7 أرقام.')" oninput="this.setCustomValidity('')">
                  <div class="invalid-feedback">الرجاء إدخال رقم هاتف صحيح يبدأ بـ 092, 093, 091, أو 094 ويليه 7 أرقام.</div>
                </div>
                <div class="mb-3">
                  <label for="profilePicture" class="form-label">الصورة التعريفية</label>
                  <input class="form-control" type="file" id="profilePicture" name="profilePicture" style="display: none;">
                  <button type="button" class="btn btn-secondary w-100" id="uploadButton">اختر صورة</button>
                  <div class="mt-3">
                    <img id="imagePreview" src="#" alt="الصورة المختارة" style="max-width: 100%; display: none;">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">تأكيد</button>
                  <button type="reset" class="btn btn-secondary">أفراغ</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="../assets/js/organizations_content.js"></script>