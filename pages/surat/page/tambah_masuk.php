<?php
session_start();
include "../../inc/koneksi.php";
$querys = mysqli_query($koneksi,"SELECT * FROM status WHERE id=1");
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
    <title>IKITAS || Surat masuk</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="../../../assets/css/font-awesome.min.css" rel="stylesheet">
    
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
        <li class="active">Surat Masuk</li>
        <li class="pull-right"><a href="surat_masuk.php">Kembali</a></li>
      </ol>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Tambah Surat Masuk</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Lembaga</label>
                  <input type="text" name="lembaga" class="form-control">
                </div>
                <div class="form-group">
                  <label>No Surat</label>
                  <input type="number" name="no_surat" class="form-control">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <?php while ($data=mysqli_fetch_array($querys)) {
                    ?>
                    <option value="<?php echo $data['id']; ?>">
                      <?php echo $data['status']; ?>
                    </option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Prihal</label>
                  <textarea name="perihal" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label>File</label>
                  <input type="file" name="file1" accept="application/pdf,image/*">
                  Format PDF/JPG
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="surat_masuk.php"><button type="button" class="btn btn-info">Batal</button></a>
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
          $lembaga=@$_POST['lembaga'];
          $no_surat=@$_POST['no_surat'];
          $tanggal =@$_POST['tanggal'];
          $status=@$_POST['status'];
          $perihal=@$_POST['perihal'];
          $date=date("d-m-Y");
          
          $sumber = @$_FILES['file1']['tmp_name'];
          $target = '../files/';
          $nama_file = @$_FILES['file1']['name'];
          
          $tambah=@$_POST['tambah'];
          if($tambah){
          if($lembaga=="" || $no_surat=="" || $tanggal=="" || $status=="" || $prihal="" || $file=""){
          ?><script>alert("Data tidak boleh ada yang kosong");</script><?php
          }else{
          $pindah = move_uploaded_file($sumber, $target.$nama_file);
          if ($pindah) {
          mysqli_query($koneksi,"INSERT INTO `surat_masuk` (`id`, `lembaga`, `no_surat`, `tanggal_surat`, `status_id`, `prihal`, `user_id`, `file`, `date`) VALUES (NULL, '$lembaga', '$no_surat', '$tanggal', '$status', '$perihal', '$user_login', '$nama_file', '$date')");
          ?><script>alert("Data berhasil ditambahkan.");window.location.href="surat_masuk.php";</script><?php
          }else{
          ?><script>alert("File tidak bisa diupload");</script><?php
          }
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