<main id="main" class="main">
  
<h1>إدارة الطلبات</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">الطلبات</h5>

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">الطلبات المقدمة</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">الطلبات المقبولة</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="borderedTabContent">
        <div class="tab-pane fade active show" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">

          <!-- بيانات النمظمة-->
           <!-- تفاصيل المنظمة -->
        <div class="card w-100">
          <div class="card-body d-flex align-items-center justify-content-between" style="width: 100%;">
           <!-- الصورة والنص -->
            <div class="d-flex align-items-center" style="gap: 20px; width: 100%;">
            <img src="assets/img/profile-img.jpg" alt="Organization Logo" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
              <div>
                <h5 class="card-title mb-0">
                  <a href="organization/dashboard.php" class="text-decoration-none text-dark">اسم المنظمة</a>
                </h5>
                <p class="mb-0 text-muted">المجال: التعليم</p>
                <p class="mb-0 text-muted">الموقع: طرابلس، ليبيا</p>
              </div>
            </div>
         </div>
        </div>

          
        </div>

        <!--  انشاء منظمة -->
        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">إنشاء منظمة</h5>

              <!-- Vertical Form -->
              <form class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">اسم المنظمة (Organization Name)</label>
                  <input type="text" class="form-control" id="inputNanme4">
                </div>
                <div class="mb-3">
                 <label for="inputDescription" class="form-label">وصف المنظمة (Organization Description)</label>
                <textarea class="form-control" id="inputDescription" style="height: 100px"></textarea>
                </div>
                  <!-- قائمة اختبار المجال -->
                <div class="mb-3">
                <label class="form-label">المجال (Field)</label>
                 <select class="form-select" aria-label="Default select example">
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
                  <!-- انتهاء قائمة اختبار المجال -->

                <div class="col-12">
                  <label for="inputAddress5" class="form-label">الموقع (Location)</label>
                  <input type="text" class="form-control" id="inputAddres5s" placeholder="الموقع">
                </div>

                <div class="col-12">
                  <label for="inputEmail4" class="form-label">البريد الإلكتروني للتواصل (Contact Email)</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>

                <div class="mb-3">
                  <label for="inputPhone" class="form-label">رقم الهاتف للتواصل (Phone Number)</label>
                     <input 
                       type="tel" 
                       id="inputPhone" 
                       class="form-control" 
                       required 
                       pattern="^(092|093|091|094)[0-9]{7}$" 
                       oninvalid="this.setCustomValidity('الرجاء إدخال رقم هاتف صحيح يبدأ بـ 092, 093, 091, أو 094 ويليه 7 أرقام.')" 
                       oninput="this.setCustomValidity('')"
                       >
                     <div class="invalid-feedback">الرجاء إدخال رقم هاتف صحيح يبدأ بـ 092, 093, 091, أو 094 ويليه 7 أرقام.</div>
                </div>

                  

                <div class="mb-3">
                <label for="formFile" class="form-label">الصورة التعريفية (Profile Picture)</label>
                <input class="form-control" type="file" id="formFile">
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">تأكيد</button>
                  <button type="reset" class="btn btn-secondary">أفراغ</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
          
        </div>
      </div>
      <!-- End Bordered Tabs -->
    </div>
  </div>
  
</main>
