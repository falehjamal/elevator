<?php
session_start();
include "../../../inc/koneksi.php";
$id=@$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM lembaga WHERE id='$id'");
$data=mysqli_fetch_array($query);
if(@$_SESSION['admin'] || @$_SESSION['user']){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elevator - Multipurpose Bootstrap Theme</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="../../../../assets/css/font-awesome.min.css" rel="stylesheet">
    
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
    background-image: url("../../../../images/background.jpg");
    }
    </style>
  </head>
  
  <div class="container" style="margin-top: 10px;">
    <div class="row">
    <ol class="breadcrumb">
      <li><a href="../../../../"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Lembaga</li>
      <li class="active">Edit Lembaga</li>
      <li class="pull-right"><a href="tampil.php">Kembali</a></li>
    </ol>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Edit Event</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal">
                <div class="form-group">
                  <label>Nama Lembaga</label>
                   <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                </div>
                
                <div class="form-group">
                  <label>Alamat Lembaga</label>
                  <textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                  <label>Email Lembaga</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                </div>

                <div class="form-group">
                  <label>NO.TLP Lembaga</label>
                  <input type="number" name="no_tlp" class="form-control" value="<?php echo $data['no_telp']; ?>">
                </div>

                <div class="form-group">
                  <label>Website Lembaga</label>
                  <input type="text" name="website" class="form-control" value="<?php echo $data['website']; ?>">
                </div>
                <div class="form-group">
                  
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="tampil.php"><button type="button" class="btn btn-info">Batal</button></a>
                  <input type="submit" name="tambah" class="btn btn-primary" value="Edit">
                </div>
              </form>
            </div>
          </div>
          
          <?php
          if ($_SESSION['admin']) {
          $user_login = $_SESSION['admin'];
          }elseif ($_SESSION['user']) {
          $user_login = $_SESSION['user'];
          }
          $website=@$_POST['website'];
          $nama=@$_POST['nama'];
          $no_tlp=@$_POST['no_tlp'];
          $alamat=@$_POST['alamat'];
          $email=@$_POST['email'];
          $user =  $user_login;
          $tanggall=date("Y-m-d H:i:s");
          $tambah=@$_POST['tambah'];
          if($tambah){
          if($nama=="" || $no_tlp=="" || $alamat=="" || $email=="" ){
          ?><script>alert("Data tidak boleh ada yang kosong");</script><?php
          }else{
          mysqli_query($koneksi,"UPDATE `lembaga` SET `nama` = '$nama',`alamat` = '$alamat',  `no_telp` = '$no_tlp' , `email` = '$email', `website`= '$website' WHERE `lembaga`.`id` = $id");
          ?><script>alert("Data berhasil diubah.");window.location.href="tampil.php";</script><?php
          }
          }
          ?>
          <?php
          }else{
          header("location:../../../../login.php");
          }
          ?>