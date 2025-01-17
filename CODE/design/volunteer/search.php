<!DOCTYPE html>

<?php
  include "head.php";

?>


<body>

<?php
 include "header.php";
 include "sidebar.php";
 include "search-contant.php";
 include "footer.php";
 include "tail.php";
 ?>
<script>
$(document).ready(function () {
  $('#searchButton').on('click', function () {
    let query = $('#searchQuery').val().trim();

    if (query === '') {
      alert('يرجى إدخال كلمة البحث');
      return;
    }

    $.ajax({
      url: '../execute/search_volunteer.php',
      type: 'POST',
      data: { query: query },
      dataType: 'json',
      success: function (response) {
        if (response.length > 0) {
          let resultsHTML = '';
          response.forEach(function (volunteer) {
            resultsHTML += `
              <div class="card w-100 mb-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center" style="gap: 20px;">
                    <img src="${volunteer.image}" alt="Volunteer Picture" class="rounded-circle"
                      style="width: 50px; height: 50px; object-fit: cover;">
                    <div>
                      <h5 class="card-title mb-0">
                        <a href="volunteer_profileView-for-other.php?id=${volunteer.id}" class="text-decoration-none text-dark">
                          ${volunteer.name}
                        </a>
                      </h5>
                      <p class="mb-0 text-muted">البريد الإلكتروني: ${volunteer.email}</p>
                    </div>
                  </div>
                </div>
              </div>
            `;
          });
          $('#searchResults').html(resultsHTML);
        } else {
          $('#searchResults').html('<p class="text-muted">لا توجد نتائج مطابقة.</p>');
        }
      },
      error: function (xhr, status, error) {
        console.error('Error:', error);
        alert('حدث خطأ أثناء البحث. يرجى المحاولة مرة أخرى.');
      }
    });
  });
});
// </script>

</body>

</html>
