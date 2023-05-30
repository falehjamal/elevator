<?php
session_start();
include "../inc/koneksi.php";
if (@$_SESSION['admin']) {

$id=@$_GET['id'];
mysqli_query($koneksi,"DELETE FROM user WHERE id='$id'");
?>
<script type="text/javascript">
	window.location.href="index.php";
</script>
<?php 
}elseif (@$_SESSION['user']) {
	header("location:index.php");
}
else{
	header("location:../../login.php");
}
 ?>
