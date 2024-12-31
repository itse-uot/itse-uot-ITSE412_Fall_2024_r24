<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>زر عرض التقييمات</title>
    <!-- إضافة Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
<main id="main" class="main">
    <h1>وظيفة التقييمات</h1>
    <button class="btn btn-success" onclick="showRatings()">عرض التقييمات</button>

    <!-- نافذة المودال -->
    <div class="modal fade" id="ratingsModal" tabindex="-1" aria-labelledby="ratingsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ratingsModalLabel">التقييمات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="ratingsContainer">
                    <!-- سيتم إضافة التقييمات هنا ديناميكياً -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    </main>
    <!-- إضافة Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // بيانات التقييمات المبدئية
        const ratings = [
            {
                name: "محمد أحمد",
                image: "user1.jpg",
                stars: 3,
                comment: "خدمة ممتازة وسريعة!"
            },
            {
                name: "سارة خالد",
                image: "user2.jpg",
                stars: 5,
                comment: "تعامل رائع من الموظفين!"
            },
            {
                name: "احمد الشريف",
                image: "user1.jpg",
                stars: 5,
                comment: "زحمة للارض"
            }
        ];

        function showRatings() {
            const ratingsContainer = document.getElementById('ratingsContainer');
            ratingsContainer.innerHTML = '';

            ratings.forEach(rating => {
                const stars = Array(5).fill('&#9734;').map((star, index) => index < rating.stars ? '&#9733;' : star).join('');

                const ratingHTML = `
                    <div class="d-flex align-items-center mb-3">
                        <img src="${rating.image}" alt="صورة المستخدم" class="rounded-circle me-2" style="width: 50px; height: 50px;">
                        <div>
                            <h6 class="mb-0">${rating.name}</h6>
                            <div class="text-warning">${stars}</div>
                            <p class="small text-muted mb-0">${rating.comment}</p>
                        </div>
                    </div>
                `;

                ratingsContainer.innerHTML += ratingHTML;
            });

            const modal = new bootstrap.Modal(document.getElementById('ratingsModal'));
            modal.show();
        }

    </script>
</body>
</html>

