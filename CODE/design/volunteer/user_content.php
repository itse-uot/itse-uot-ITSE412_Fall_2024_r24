<main id="main" class="main">

  
    <!-- Form Wrapper -->
    <div class="card bg-white p-4 rounded border shadow">
        <h5 class="card-title text-center mb-4">أعدادات الحساب</h5>
      <!-- Horizontal Form -->
      <form>
        <!-- الاسم -->
        <div class="mb-3">
          <label for="inputText" class="form-label fw-bold">اسم المستخدم</label>
          <input type="text" class="form-control" id="inputText" value="username">
        </div>

        <!-- البريد الالكتروني -->
        <div class="mb-3">
          <label for="inputEmail" class="form-label fw-bold">البريد الالكتروني</label>
          <input type="email" class="form-control" id="inputEmail" value="user@example.com">
        </div>

        <!-- كلمه السر -->
        <div class="mb-3">
          <label for="inputPassword" class="form-label fw-bold">كلمه السر</label>
          <input type="password" class="form-control" id="inputPassword" value="you cant se my face hahaahah">
        </div>

        <!-- الأزرار -->
        <div class="text-center">
          
          <button type="submit" class="btn btn-outline-primary">حفظ</button>
          <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal" data-bs-target="#basicModal">
            حذف
          </button>
        </div>
      </form>
      <!-- End Horizontal Form -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">رسالة تنبيه!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            هل متأكد من انك تريد حذف حسابيك!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
            <button type="button" class="btn btn-danger">تأكيد</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->
  
</main>
