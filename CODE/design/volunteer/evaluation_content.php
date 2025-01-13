  <!-- Modal لإضافة التقييم -->
  <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">إضافة تقييم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- عرض التقييمات السابقة -->
        <div class="mb-4">
          <h6>التقييمات السابقة:</h6>
          <div id="previousReviews">
            <div class="mb-3 d-flex align-items-start">
              <span class="text-warning fs-5 me-2">★★★★★</span>
              <div>
                <strong>محمد أحمد</strong>
                <p class="text-muted mb-0">فعالية رائعة! التنظيم كان ممتازًا.</p>
                <button class="btn btn-sm btn-outline-primary edit-review" data-id="1">تعديل</button>
                <button class="btn btn-sm btn-outline-danger delete-review" data-id="1">حذف</button>
              </div>
            </div>
            <div class="mb-3 d-flex align-items-start">
              <span class="text-warning fs-5 me-2">★★★★☆</span>
              <div>
                <strong>سارة علي</strong>
                <p class="text-muted mb-0">أنشطة ممتعة ولكن المكان كان مزدحمًا بعض الشيء.</p>
                <button class="btn btn-sm btn-outline-primary edit-review" data-id="2">تعديل</button>
                <button class="btn btn-sm btn-outline-danger delete-review" data-id="2">حذف</button>
              </div>
            </div>
            <div class="mb-3 d-flex align-items-start">
              <span class="text-warning fs-5 me-2">★★★☆☆</span>
              <div>
                <strong>أحمد سالم</strong>
                <p class="text-muted mb-0">تجربة متوسطة، يمكن تحسين التنظيم.</p>
                <button class="btn btn-sm btn-outline-primary edit-review" data-id="3">تعديل</button>
                <button class="btn btn-sm btn-outline-danger delete-review" data-id="3">حذف</button>
              </div>
            </div>
          </div>
        </div>
        <!-- نموذج التقييم -->
        <form id="reviewForm">
          <div class="mb-3">
            <label for="ratingStars" class="form-label">التقييم:</label>
            <div id="ratingStars" class="d-flex gap-2">
              <i class="bi bi-star fs-4" data-value="1"></i>
              <i class="bi bi-star fs-4" data-value="2"></i>
              <i class="bi bi-star fs-4" data-value="3"></i>
              <i class="bi bi-star fs-4" data-value="4"></i>
              <i class="bi bi-star fs-4" data-value="5"></i>
            </div>
            <input type="hidden" id="ratingValue" name="ratingValue" value="0">
          </div>
          <div class="mb-3">
            <label for="reviewDescription" class="form-label">الوصف:</label>
            <textarea id="reviewDescription" class="form-control" rows="3" placeholder="اكتب تعليقك هنا..." required></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">إرسال</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  // التفاعل مع النجوم للتقييم
  const stars = document.querySelectorAll('#ratingStars .bi-star');
  const ratingValueInput = document.getElementById('ratingValue');
  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      stars.forEach((s, i) => {
        if (i <= index) {
          s.classList.remove('bi-star');
          s.classList.add('bi-star-fill');
        } else {
          s.classList.remove('bi-star-fill');
          s.classList.add('bi-star');
        }
      });
      ratingValueInput.value = index + 1;
    });
  });

  // معالجة إرسال التقييم
  document.getElementById('reviewForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const rating = parseInt(ratingValueInput.value);
    const description = document.getElementById('reviewDescription').value;
    if (rating > 0 && description.trim() !== "") {
      alert(`تم إرسال التقييم بنجاح!\nالتقييم: ${rating} نجوم\nالوصف: ${description}`);
      document.getElementById('reviewForm').reset();
    } else {
      alert('يرجى اختيار عدد النجوم وإضافة وصف.');
    }
  });

  // تعديل التقييم
  document.querySelectorAll('.edit-review').forEach(button => {
    button.addEventListener('click', (e) => {
      const reviewId = e.target.getAttribute('data-id');
      alert(`تعديل التقييم ID: ${reviewId}`);
      // أضف هنا الكود اللازم لجلب البيانات وعرضها للتعديل
    });
  });

  // حذف التقييم
  document.querySelectorAll('.delete-review').forEach(button => {
    button.addEventListener('click', (e) => {
      const reviewId = e.target.getAttribute('data-id');
      if (confirm(`هل أنت متأكد من حذف التقييم ID: ${reviewId}؟`)) {
        alert(`تم حذف التقييم ID: ${reviewId}`);
        // أضف هنا الكود اللازم لحذف التقييم من قاعدة البيانات
      }
    });
  });
</script>
