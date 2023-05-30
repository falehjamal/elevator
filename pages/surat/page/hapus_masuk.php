<?php 
session_start();
include "../../inc/koneksi.php";
if (@$_SESSION['admin']) {
$id=@$_GET['id'];

mysqli_query($koneksi,"DELETE FROM surat_masuk WHERE id='$id'");

 ?>
 <script type="text/javascript">
 	window.location.href="surat_masuk.php";
 </script>
    <?php
        }elseif (@$_SESSION['user']) {
		header("location:../../sesi.php");
		}
        else{
        header("location:../../../login.php");
        }
        ?>