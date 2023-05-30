<?php
session_start();
include "../../inc/koneksi.php";
if ($_SESSION['admin']) {
$id=@$_GET['id'];
mysqli_query($koneksi,"DELETE FROM jurusan WHERE id='$id'");
?>
<script type="text/javascript">
	window.location.href="jurusan.php";
</script>
<?php
}elseif (@$_SESSION['user']) {
header("location:../../sesi.php");
}else{
header("location:../../../login.php");
}
?>