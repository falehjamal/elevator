<?php
session_start(); 
include "../../inc/koneksi.php";

$querys = mysqli_query($koneksi,"SELECT * FROM jk");
$queryq = mysqli_query($koneksi,"SELECT * FROM jurusan");
$querya = mysqli_query($koneksi,"SELECT * FROM sekolah");

if (@$_SESSION['admin']) {
 
 ?>


 <!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>IKITAS || Siswa</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="assets/css/animate.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='assets/http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>


        <!-- Template js -->
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/contact_me.js"></script>
        <script src="assets/js/jqBootstrapValidation.js"></script>
        <script src="assets/js/modernizr.custom.js"></script>
        <script src="assets/js/script.js"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{
                background-image: url("../../images/background.jpg");
            }
        </style>

    </head>
     
 <div class="container" style="margin-top: 10px;">
               
                    <div class="row">
                     <ol class="breadcrumb">
                <li><a href="../../../"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">siswa</li>
                <li class="pull-right"><a href="siswa.php">Kembali</a></li>
                </ol>
                       <div class="panel panel-primary">
                <div class="panel-heading">
                <h3 class="panel-title">Tambah siswa</h3>
                </div>
                <div class="panel-body">
                 <div class="container">
 <div class="col-lg-4"> 

  <form method="post" class="form-horizontal" enctype="multipart/form-data">
   <div class="form-group">
    <label>nama</label>
    <input type="text" name="nama" class="form-control" required>
   </div>
   <div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control" accept="image/*" required>
   </div>
   <div class="form-group">
    <label>sekolah</label>
    <select name="sekolah" class="form-control" required>
        <?php while ($data=mysqli_fetch_array($querya)) {  
            ?>
              <option value="<?php echo $data['id']; ?>">
                <?php echo $data['nama']; ?>
              </option>
              <?php }?>
      </select>
   </div>
    <div class="form-group">
    <label>jurusan</label>
      <select name="jurusan" class="form-control" required>
        <?php while ($data=mysqli_fetch_array($queryq)) {  
            ?>
              <option value="<?php echo $data['id']; ?>">
                <?php echo $data['nama']; ?>
              </option>
              <?php }?>
      </select>
   </div>
   <div class="form-group">
    <label>Jenis kelamin</label>
      <select name="jk" class="form-control" required>
        <?php while ($data=mysqli_fetch_array($querys)) {  
            ?>
              <option value="<?php echo $data['id']; ?>">
                <?php echo $data['jk']; ?>
              </option>
              <?php }?>
      </select>
   </div>
   <div class="form-group">
    <label>Tanggal masuk</label>
    <input type="date" name="tgl_masuk" class="form-control" required>
   </div>
   <div class="form-group">
    <label>Tanggal keluar</label>
    <input type="date" name="tgl_keluar" class="form-control" required>
   </div>
   <div class="form-group">
    <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
    <button type="reset" class="btn btn-danger">Reset</button>
    <a href="siswa.php"><button type="button" class="btn btn-info">Batal</button></a>
   </div>
  </form>
 </div>
</div>
  
 <?php 
 if (@$_SESSION['admin']) {
   $user_login = $_SESSION['admin'];
 }elseif (@$_SESSION['user']) {
   $user_login = $_SESSION['user'];
 }
 $user_id = $_SESSION['id'];

  $nama=@$_POST['nama'];
  
  $sumber = @$_FILES['foto']['tmp_name'];
  $target = 'foto/';
  $nama_file = @$_FILES['foto']['name'];

  $sekolah=@$_POST['sekolah'];
  $jurusan=@$_POST['jurusan'];
  $jk=@$_POST['jk'];
  $tgl_masuk=@$_POST['tgl_masuk'];
  $tgl_keluar=@$_POST['tgl_keluar'];

  $tambah=@$_POST['tambah'];

  if($tambah){
    $pindah = move_uploaded_file($sumber, $target.$nama_file);
    if ($pindah) {
      mysqli_query($koneksi,"INSERT INTO `siswa` (`id`, `foto`, `nama`, `sekolah_id`, `jurusan_id`, `tgl_masuk`, `tgl_keluar`, `jk_id`, `user_id`) VALUES (NULL, '$nama_file', '$nama', '$sekolah', '$jurusan', '$tgl_masuk', '$tgl_keluar', '$jk', '$user_id')");
      ?><script>alert("Data berhasil ditambahkan.");window.location.href="siswa.php";</script><?php
     }else{
      ?><script>alert("Foto tidak bisa diupload.");</script><?php
     }
  }

 ?>


<?php 
}elseif (@$_SESSION['user']) {
header("location:../../sesi.php");
}else{
  header("location:../../../login.php");
}
 ?>
