
<!DOCTYPE html>

<?php
  include "head.php";

?>


<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white shadow p-4 rounded" style="width: 100%; max-width: 600px;">
        <h2 class="text-center mb-4">سجل بياناتك</h2>
        <form id="editProfileForm" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">صورة الملف</label>
                <div class="col-md-8 col-lg-9">
                    <img id="profileImagePreview" src="assets/img/default-profile.png" alt="Profile" class="img-fluid rounded-circle mb-2">
                    <div class="pt-2">
                        <input type="file" class="form-control" name="profileImage" id="profileImage">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="fullName2" class="col-md-4 col-lg-3 col-form-label">الاسم الكامل</label>
                <div class="col-md-8 col-lg-9">
                    <input name="fullName2" type="text" class="form-control" id="fullName2">
                </div>
            </div>
            <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">المهارات</label>
                <div class="col-md-8 col-lg-9">
                    <textarea name="about" class="form-control" id="about" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">رقم الهاتف</label>
                <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone">
                </div>
            </div>
            <div class="row mb-3">
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">البريد الإلكتروني</label>
                <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">تسجيل</button>
            </div>
        </form>
    </div>
</div>
<?php
 
 include "footer.php";
 include "tail.php";

 ?>




</body>

</html>
