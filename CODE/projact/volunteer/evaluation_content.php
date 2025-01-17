<!-- Modal لتعديل التقييم -->
<div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editReviewModalLabel">تعديل التقييم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- نموذج التعديل -->
                <form id="editReviewForm">
                    <input type="hidden" id="editReviewID" name="editReviewID">
                    <div class="mb-3">
                        <label for="editRatingStars" class="form-label">التقييم:</label>
                        <div id="editRatingStars" class="d-flex gap-2">
                            <i class="bi bi-star fs-4" data-value="1"></i>
                            <i class="bi bi-star fs-4" data-value="2"></i>
                            <i class="bi bi-star fs-4" data-value="3"></i>
                            <i class="bi bi-star fs-4" data-value="4"></i>
                            <i class="bi bi-star fs-4" data-value="5"></i>
                        </div>
                        <input type="hidden" id="editRatingValue" name="editRatingValue" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="editReviewDescription" class="form-label">الوصف:</label>
                        <textarea id="editReviewDescription" class="form-control" rows="3" placeholder="اكتب تعليقك هنا..." required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/evaluation.js"></script>