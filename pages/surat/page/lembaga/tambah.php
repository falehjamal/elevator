<?php
session_start();
include "../../../inc/koneksi.php";
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
    <ol class="breadcrumb">
      <li><a href="../../../../"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">lembaga</li>
      <li class="active">Tambah lembaga</li>
      <li class="pull-right"><a href="tampil.php">Kembali</a></li>
    </ol>
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Tambah lembaga</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal" action="">
                <div class="form-group">
                  <label>Nama Lembaga</label>
                   <input type="text" name="nama" class="form-control">
                </div>
                
                <div class="form-group">
                  <label>Alamat Lembaga</label>
                  <textarea name="alamat" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label>Email Lembaga</label>
                  <input type="text" name="email1" class="form-control" >
                </div>

                <div class="form-group">
                  <label>NO.TLP Lembaga</label>
                  <input type="number" name="no_tlp" class="form-control" >
                </div>

                <div class="form-group">
                  <label>Website Lembaga</label>
                  <input type="text" name="website1" class="form-control" >
                </div>
                <div class="form-group">
                  
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="tampil.php"><button type="button" class="btn btn-info">Batal</button></a>
                  <input type="submit" name="tambah" class="btn btn-primary" value="simpan">
                </div>
              </form>
            </div>
          </div>
          
          <?php
          $website=@$_POST['website1'];
          $nama=@$_POST['nama'];
          $no_tlp=@$_POST['no_tlp'];
          $alamat=@$_POST['alamat'];
           $email=@$_POST['email1'];
          $tambah=@$_POST['tambah'];
          if($tambah){
            if($nama=="" || $no_tlp=="" || $alamat=="" || $email=="" || $website==""){
          ?><script>alert("Data tidak boleh ada yang kosong");</script><?php
          }else{
          mysqli_query($koneksi,"INSERT INTO `lembaga` (`id`, `nama`, `alamat`, `no_telp`, `email`, `website`) VALUES (NULL, '$nama', '$alamat', '$no_tlp', '$email', '$website');") or die(mysqli_error($koneksi));
          ?>

          <script>alert("Data berhasil ditambahkan.");window.location.href="tampil.php";</script>

          <?php
          }
          }
          ?>

           <?php 
}else{
    header("location:../../../../login.php");
}
  ?>