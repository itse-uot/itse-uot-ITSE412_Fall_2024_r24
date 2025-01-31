$(document).ready(function () {
    const eventID = $('#eventID').val(); // الحصول على eventID من النموذج
    let isSubmitting = false; // متغير لمنع الإرسال المتكرر

    // جلب التقييمات السابقة عند فتح المودال
    $('#reviewModal').on('show.bs.modal', function () {
        loadPreviousReviews();
    });

    // وظيفة لجلب التقييمات السابقة
    function loadPreviousReviews() {
        $.ajax({
            type: 'GET',
            url: '../execute/review_operations.php',
            data: { eventID: eventID },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    let reviewsHtml = '';
                    response.reviews.forEach(review => {
                        reviewsHtml += `
                            <div class="mb-3 d-flex align-items-start">
                                <span class="text-warning fs-5 me-2">${getStarRating(review.Rating)}</span>
                                <div>
                                    <strong>${review.ReviewText}</strong>
                                    <p class="text-muted mb-0">${review.CreatedAt}</p>
                                    <button class="btn btn-sm btn-outline-primary edit-review" data-id="${review.ReviewID}" data-rating="${review.Rating}" data-text="${review.ReviewText}">تعديل</button>
                                    <button class="btn btn-sm btn-outline-danger delete-review" data-id="${review.ReviewID}">حذف</button>
                                </div>
                            </div>
                        `;
                    });
                    $('#previousReviews').html(reviewsHtml);
                } else {
                    $('#previousReviews').html('<p>لا توجد تقييمات سابقة.</p>');
                }
            },
            error: function () {
                $('#previousReviews').html('<p>حدث خطأ أثناء جلب التقييمات.</p>');
            }
        });
    }

    // وظيفة لتحويل التقييم إلى نجوم
    function getStarRating(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += i <= rating ? '★' : '☆';
        }
        return stars;
    }

    // معالجة إرسال التقييم
    $('#reviewForm').on('submit', function (e) {
        e.preventDefault(); // منع الإرسال الافتراضي للنموذج

        if (isSubmitting) return; // منع الإرسال المتكرر

        const eventID = $('#eventID').val();
        const volunteerID = $('#volunteerID').val();
        const rating = parseInt($('#ratingValue').val());
        const description = $('#reviewDescription').val();

        if (rating < 1 || rating > 5) {
            alert('يرجى اختيار تقييم بين 1 و 5.');
            return;
        }

        if (description.trim() === "") {
            alert('يرجى إضافة وصف.');
            return;
        }

        isSubmitting = true; // تعيين حالة الإرسال إلى true

        // إرسال البيانات عبر Ajax
        $.ajax({
            type: 'POST',
            url: '../execute/review_operations.php',
            data: {
                action: 'add',
                eventID: eventID,
                volunteerID: volunteerID,
                rating: rating,
                reviewText: description
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('تم إرسال التقييم بنجاح!');
                    $('#reviewForm')[0].reset(); // إعادة تعيين النموذج
                    $('#reviewModal').modal('hide'); // إغلاق المودال بعد الإرسال
                    loadPreviousReviews(); // إعادة تحميل التقييمات
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
                isSubmitting = false; // إعادة تعيين حالة الإرسال إلى false
            },
            error: function () {
                alert('حدث خطأ أثناء إرسال التقييم. يرجى المحاولة مرة أخرى.');
                isSubmitting = false; // إعادة تعيين حالة الإرسال إلى false
            }
        });
    });

    // تفعيل أزرار الحذف والتعديل
    $(document).on('click', '.delete-review', function () {
        const reviewID = $(this).data('id');
        if (confirm('هل أنت متأكد من حذف هذا التقييم؟')) {
            deleteReview(reviewID);
        }
    });

    $(document).on('click', '.edit-review', function () {
        const reviewID = $(this).data('id');
        const rating = $(this).data('rating');
        const reviewText = $(this).data('text');

        // عرض بانل التعديل مع النجوم والنص الموجود مسبقًا
        $('#editReviewModal').modal('show');
        $('#editReviewModal #editRatingValue').val(rating);
        $('#editReviewModal #editReviewDescription').val(reviewText);
        $('#editReviewModal #editReviewID').val(reviewID);

        // تعبئة النجوم بناءً على التقييم الموجود
        const editStars = document.querySelectorAll('#editRatingStars .bi-star');
        editStars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('bi-star');
                star.classList.add('bi-star-fill');
            } else {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            }
        });
    });

    // معالجة إرسال التعديل
    $('#editReviewForm').on('submit', function (e) {
        e.preventDefault();
        const reviewID = $('#editReviewID').val();
        const rating = parseInt($('#editRatingValue').val());
        const description = $('#editReviewDescription').val();

        if (rating < 1 || rating > 5) {
            alert('يرجى اختيار تقييم بين 1 و 5.');
            return;
        }

        if (description.trim() === "") {
            alert('يرجى إضافة وصف.');
            return;
        }

        $.ajax({
            type: 'POST',
            url: '../execute/review_operations.php',
            data: {
                action: 'update',
                reviewID: reviewID,
                rating: rating,
                reviewText: description
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('تم تعديل التقييم بنجاح!');
                    $('#editReviewModal').modal('hide'); // إغلاق المودال بعد التعديل
                    loadPreviousReviews(); // إعادة تحميل التقييمات
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء تعديل التقييم.');
            }
        });
    });

    // وظيفة لحذف التقييم
    function deleteReview(reviewID) {
        $.ajax({
            type: 'POST',
            url: '../execute/review_operations.php',
            data: { action: 'delete', reviewID: reviewID },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('تم حذف التقييم بنجاح!');
                    loadPreviousReviews(); // إعادة تحميل التقييمات
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
            },
            error: function () {
                alert('حدث خطأ أثناء حذف التقييم.');
            }
        });
    }
});