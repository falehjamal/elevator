<?php 
session_start();
include "../../../inc/koneksi.php";
if(@$_SESSION['admin'] || @$_SESSION['user']){
$id=@$_GET['id'];

mysqli_query($koneksi,"DELETE FROM lembaga WHERE id='$id'");

 ?>
 <script type="text/javascript">
 	window.location.href="tampil.php";
 </script>

 <?php
          }else{
          header("location:../../../../login.php");
          }
          ?>