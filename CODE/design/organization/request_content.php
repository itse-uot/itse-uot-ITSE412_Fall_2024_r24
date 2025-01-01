<main id="main" class="main">
  <h1>إدارة الطلبات</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">الطلبات</h5>

      <!-- Bordered Tabs -->
      <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home"
            type="button" role="tab" aria-controls="home" aria-selected="true">الطلبات المقدمة</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile"
            type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">الطلبات
            المقبولة</button>
        </li>
      </ul>

      <div class="tab-content pt-2" id="borderedTabContent">
        <div class="tab-pane fade active show" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">

          <!-- طلب التطوع -->

          <div class="card w-100 mb-3 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
              <!-- معلومات المستخدم -->
              <div class="d-flex align-items-center gap-3">
                <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"
                  style="width: 50px; height: 50px; object-fit: cover;">
                <div>
                  <h5 class="card-title mb-0">المستخدم</h5>
                  <small style="color: #6c757d;">user@gmail.com</small> <!-- لون النص الرمادي -->
                </div>
              </div>

              <!-- معلومات الفعالية -->
              <div class="text-end">
                <small class="d-block" style="font-size: 14px; color: #495057;"><strong>فعالية:</strong> اليوم
                  المفتوح</small>
                <small class="d-block" style="font-size: 14px; color: #6c757d;"><strong>الموقع:</strong> المدينة
                  الجامعية</small>
              </div>

              <!-- أزرار التحكم -->
              <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-primary">قبول</button>
                <button type="button" class="btn btn-sm btn-danger">رفض</button>
              </div>
            </div>
          </div>

        </div>

        <!-- الطلبات المقبولة -->
        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">فعالية اليوم المفتوح</h5>
              <p>يوم مفتوح للمشاركة في أنشطة اجتماعية وتعليمية متنوعة</p>

              <ul class="nav-item">
                <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"
                  aria-expanded="true">
                  <i class="bi bi-layout-text-window-reverse"></i><span> عرض </span><i
                    class="bi bi-chevron-down ms-auto"></i>
                </a>
                <li id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav"
                  style="list-style-type: none;">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">المتطوعين</h5>

                      <!-- Default Table -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">البريد الإلكتروني</th>
                            <th scope="col">تاريخ التقديم</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>أحمد محمد</td>
                            <td>091-234-5678</td>
                            <td>ahmed.mohammed@example.com</td>
                            <td>2024-12-15</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>سارة علي</td>
                            <td>092-345-6789</td>
                            <td>sarah.ali@example.com</td>
                            <td>2024-12-14</td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <!-- إضافة فعاليات أخرى -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">فعالية زرع الأشجار</h5>
              <p>يوم تطوعي لزراعة الأشجار وتشجيع الحفاظ على البيئة.</p>

              <ul class="nav-item">
                <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"
                  aria-expanded="true">
                  <i class="bi bi-layout-text-window-reverse"></i><span> عرض </span><i
                    class="bi bi-chevron-down ms-auto"></i>
                </a>
                <li id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav"
                  style="list-style-type: none;">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">المتطوعين</h5>

                      <!-- Default Table -->
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">البريد الإلكتروني</th>
                            <th scope="col">تاريخ التقديم</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>فاطمة الزهراء</td>
                            <td>096-789-0123</td>
                            <td>fatima.zahra@example.com</td>
                            <td>2024-12-10</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>يوسف أحمد</td>
                            <td>097-890-1234</td>
                            <td>youssef.ahmed@example.com</td>
                            <td>2024-12-09</td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- End Default Table Example -->
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End Bordered Tabs -->
    </div>
  </div>
</main>