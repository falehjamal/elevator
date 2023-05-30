<?php
@session_start();
include "../../inc/koneksi.php";
if (@$_SESSION['admin']) {
$id=@$_GET['id'];
mysqli_query($koneksi,"DELETE FROM siswa WHERE id='$id'");
?>
<script type="text/javascript">
	window.location.href="siswa.php";
</script>
<?php 
}elseif (@$_SESSION['user']) {
header("location:../../sesi.php");
}else{
	header("location:../../../login.php");
}
 ?>
