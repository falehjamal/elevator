<?php
session_start();
include "../inc/koneksi.php";
$id=@$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM buku_tamu WHERE id='$id'");
$dataa=mysqli_fetch_array($query);
if(@$_SESSION['admin']){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IKITAS || Buku tamu</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href='assets/http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <!-- Template js -->
    <style type="text/css">
    body{
    background-image: url("../../images/background.jpg");
    }
    </style>
  </head>
  
  <div class="container" style="margin-top: 10px;">
   <div class="row">
    <ol class="breadcrumb">
      <li><a href="../../"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Buku Tamu</li>
      <li class="active">Edit Tamu</li>
      <li class="pull-right"><a href="index.php">Kembali</a></li>
    </ol>
   
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Edit Tamu</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal">
                <div class="form-group">
                  <label>Nama</label>
                   <input type="text" name="nama" class="form-control" value="<?php echo $dataa['nama']; ?>">
                </div>
                <div class="form-group">
                  <label>Dari lembaga</label>
                   <input type="text" name="lembaga" class="form-control" value="<?php echo $dataa['lembaga']; ?>">
                </div>
                 <div class="form-group">
                  <label>Tanggal Kunjung</label>
                 <input type="date" name="tanggal2" class="form-control" value="<?php echo $dataa['tanggal']; ?>">
                </div>
                 <div class="form-group">
                  <label>Keterangan</label>
                 <textarea name="keterangan" class="form-control"><?php echo $dataa['keterangan']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>No Telepon</label>
                 <input type="number" name="no_tlp" class="form-control" value="<?php echo $dataa['no_tlp']; ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                 <input type="email" name="email" class="form-control" value="<?php echo $dataa['email']; ?>">
                </div>
                <div class="form-group">
                   <input type="submit" name="tambah" class="btn btn-primary" value="Edit">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="index.php"><button type="button" class="btn btn-info">Batal</button></a>
                </div>
              </form>
            </div>
          </div>
          
          <?php
            if (@$_SESSION['admin']) {
              $user_login = $_SESSION['admin']=1;
            }elseif (@$_SESSION['user']) {
              $user_login = $_SESSION['user']=2;
            }
          $nama=@$_POST['nama'];
          $no_tlp=@$_POST['no_tlp'];
          $lembaga=@$_POST['lembaga'];
          $tanggal2 = @$_POST['tanggal2'];
          $keterangan = @$_POST['keterangan'];
          $email = @$_POST['email'];
          $tanggall=date("d-m-Y");
          $tambah=@$_POST['tambah'];
          if($tambah){
          if($nama=="" || $no_tlp=="" || $lembaga=="" || $tanggal2=="" || $keterangan=="" || $email==""){
          ?><script>alert("Data tidak boleh ada yang kosong");</script><?php
          }else{
          mysqli_query($koneksi,"UPDATE `buku_tamu` SET `nama` = '$nama', `lembaga` = '$lembaga', `tanggal` = '$tanggal2', `no_tlp` = '$no_tlp', `user_id` = '$user_login', `keterangan` = '$keterangan', `tanggal2` = '$tanggall', `email` = '$email' WHERE `buku_tamu`.`id` = $id");
          ?><script>alert("Data berhasil diubah.");window.location.href="index.php";</script><?php
          }
          }
          ?>
          <?php
          }elseif (@$_SESSION['user']) {
          header("location:../sesi.php");
          }else{
          header("location:../../login.php");
          }
          ?>