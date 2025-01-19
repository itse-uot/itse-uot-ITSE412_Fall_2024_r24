
<?php
if (isset($_GET['orgID'])) {
  $orgID = $_GET['orgID']; // الحصول على orgID من الرابط
  $_SESSION['org'] = $orgID; // تخزين orgID في الجلسة
}
if (isset($_SESSION['org'])) {
  echo "تم تخزين orgID في الجلسة: " . $_SESSION['org'];
} else {
  echo "لم يتم تعيين orgID في الجلسة.";
}

?>
<!DOCTYPE html>

<?php
  include "head.php";

?>


<body>

<?php
 include "header.php";
 include "sidebar.php";
 include "dashboard_content.php";
 include "footer.php";
 include "tail.php";

 ?>




</body>

</html>
