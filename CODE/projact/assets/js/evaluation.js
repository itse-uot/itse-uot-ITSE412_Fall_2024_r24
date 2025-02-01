$(document).ready(function () {
    let userID = 2; // تعيين userID من الجلسة
    let isSubmitting = false;

    // عند فتح المودال، تعيين eventID
    $('#reviewModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // الزر الذي تم النقر عليه
        const eventID = button.data('event-id'); // استخراج eventID من الزر
        $('#eventID').val(eventID); // تعيين eventID في الحقل المخفي
        loadPreviousReviews(eventID); // جلب التقييمات السابقة
    });

    // وظيفة لجلب التقييمات السابقة
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

    // التفاعل مع النجوم للتقييم في مودال الإضافة
    const stars = document.querySelectorAll('#ratingStars .bi-star');
    const ratingValueInput = document.getElementById('ratingValue');

    if (stars.length && ratingValueInput) {
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
    } else {
        console.error('عناصر النجوم غير موجودة في الصفحة.');
    }

    // معالجة إرسال التقييم
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

        $('#editReviewModal').modal('show');
        $('#editReviewModal #editRatingValue').val(rating);
        $('#editReviewModal #editReviewDescription').val(reviewText);
        $('#editReviewModal #editReviewID').val(reviewID);

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

    // وظيفة لحذف التقييم
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
});أ