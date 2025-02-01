$(document).ready(function () {
    let userID = null; // سيتم تعيينه من الجلسة
    let isSubmitting = false;

    // جلب userID من الجلسة عند تحميل الصفحة
    $.ajax({
        type: 'GET',
        url: '../execute/get_session.php',
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success' && response.userID) {
                userID = response.userID;
            } else {
                alert('يجب تسجيل الدخول لإضافة تقييم.');
                window.location.href = '../login.php';
            }
        },
        error: function () {
            alert('حدث خطأ أثناء جلب بيانات الجلسة.');
        }
    });

    // عند فتح مودال الإضافة، تعيين eventID وجلب التقييمات السابقة
    $('#reviewModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const eventID = button.data('event-id');
        $('#eventID').val(eventID);
        loadPreviousReviews(eventID);
        
        // إعادة تعيين النجوم في مودال الإضافة
        $('#ratingStars i').removeClass('bi-star-fill').addClass('bi-star');
        $('#ratingValue').val(0);
    });

    // تحميل التقييمات السابقة
    function loadPreviousReviews(eventID) {
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
                                    <button class="btn btn-sm btn-outline-primary edit-review" 
                                        data-id="${review.ReviewID}" 
                                        data-rating="${review.Rating}" 
                                        data-text="${review.ReviewText}">
                                        تعديل
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger delete-review" data-id="${review.ReviewID}">
                                        حذف
                                    </button>
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

    // دالة تحويل رقم التقييم إلى نجوم (للعرض فقط)
    function getStarRating(rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += i <= rating ? '★' : '☆';
        }
        return stars;
    }

    // تفاعل النجوم في مودال الإضافة (باستخدام تفويض الحدث)
    $('#ratingStars').on('click', 'i', function () {
        const $allStars = $('#ratingStars i');
        const clickedValue = parseInt($(this).data('value')); // القيمة المأخوذة من data-value
        $allStars.each(function () {
            const starValue = parseInt($(this).data('value'));
            if (starValue <= clickedValue) {
                $(this).removeClass('bi-star').addClass('bi-star-fill');
            } else {
                $(this).removeClass('bi-star-fill').addClass('bi-star');
            }
        });
        $('#ratingValue').val(clickedValue);
    });

    // فتح مودال التعديل وتعبئة البيانات
    $(document).on('click', '.edit-review', function () {
        const reviewID = $(this).data('id');
        const rating = parseInt($(this).data('rating'));
        const reviewText = $(this).data('text');

        // فتح مودال التعديل
        $('#editReviewModal').modal('show');
        $('#editReviewID').val(reviewID);
        $('#editReviewDescription').val(reviewText);
        $('#editRatingValue').val(rating);

        // إعادة تعيين النجوم في مودال التعديل
        const $editStars = $('#editRatingStars i');
        $editStars.removeClass('bi-star-fill').addClass('bi-star');
        $editStars.each(function () {
            const starValue = parseInt($(this).data('value'));
            if (starValue <= rating) {
                $(this).removeClass('bi-star').addClass('bi-star-fill');
            }
        });
    });

    // تفاعل النجوم في مودال التعديل (باستخدام تفويض الحدث)
    $('#editRatingStars').off('click').on('click', 'i', function () {
        const $allEditStars = $('#editRatingStars i');
        const clickedValue = parseInt($(this).data('value'));
        $allEditStars.each(function () {
            const starValue = parseInt($(this).data('value'));
            if (starValue <= clickedValue) {
                $(this).removeClass('bi-star').addClass('bi-star-fill');
            } else {
                $(this).removeClass('bi-star-fill').addClass('bi-star');
            }
        });
        $('#editRatingValue').val(clickedValue);
    });

    // إرسال نموذج التعديل
    $('#editReviewForm').on('submit', function (e) {
        e.preventDefault();
        const reviewID = $('#editReviewID').val();
        const rating = parseInt($('#editRatingValue').val());
        const description = $('#editReviewDescription').val();

        if (rating > 0 && description.trim() !== "") {
            $.ajax({
                type: 'POST',
                url: '../execute/review_operations.php',
                data: {
                    action: 'update',
                    reviewID: reviewID,
                    userID: userID,
                    rating: rating,
                    reviewText: description
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        alert('تم تعديل التقييم بنجاح!');
                        $('#editReviewModal').modal('hide');
                        loadPreviousReviews($('#eventID').val());
                    } else {
                        alert('حدث خطأ: ' + response.message);
                    }
                },
                error: function () {
                    alert('حدث خطأ أثناء تعديل التقييم.');
                }
            });
        } else {
            alert('يرجى اختيار عدد النجوم وإضافة وصف.');
        }
    });

    // إرسال نموذج الإضافة
    $('#reviewForm').on('submit', function (e) {
        e.preventDefault();
        if (isSubmitting) return;

        const eventID = $('#eventID').val();
        const rating = parseInt($('#ratingValue').val());
        const description = $('#reviewDescription').val();

        if (rating > 0 && description.trim() !== "") {
            isSubmitting = true;
            $.ajax({
                type: 'POST',
                url: '../execute/review_operations.php',
                data: {
                    action: 'add',
                    eventID: eventID,
                    userID: userID,
                    rating: rating,
                    reviewText: description
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        alert('تم إرسال التقييم بنجاح!');
                        $('#reviewForm')[0].reset();
                        $('#reviewModal').modal('hide');
                        loadPreviousReviews(eventID);
                    } else {
                        alert('حدث خطأ: ' + response.message);
                    }
                    isSubmitting = false;
                },
                error: function () {
                    alert('حدث خطأ أثناء إرسال التقييم. يرجى المحاولة مرة أخرى.');
                    isSubmitting = false;
                }
            });
        } else {
            alert('يرجى اختيار عدد النجوم وإضافة وصف.');
        }
    });

    // حذف تقييم
    $(document).on('click', '.delete-review', function () {
        const reviewID = $(this).data('id');
        if (confirm('هل أنت متأكد من حذف هذا التقييم؟')) {
            deleteReview(reviewID);
        }
    });

    // دالة حذف التقييم
    function deleteReview(reviewID) {
        $.ajax({
            type: 'POST',
            url: '../execute/review_operations.php',
            data: { action: 'delete', reviewID: reviewID, userID: userID },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert('تم حذف التقييم بنجاح!');
                    loadPreviousReviews($('#eventID').val());
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
