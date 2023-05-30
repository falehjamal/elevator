<?php
  session_start();
  include "../../inc/koneksi.php";

  $id=$_GET['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM sekolah WHERE id='$id'");
  $data= mysqli_fetch_array($query);
  if ($_SESSION['admin']) {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IKITAS || Sekolah</title>
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
    \    <style type="text/css">
    body{
    background-image: url("../../images/background.jpg");
    }
    </style>
  </head>
  
  <div class="container" style="margin-top: 10px;">
    
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="../../../"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">sekolah</li>
        <li class="pull-right"><a href="sekolah.php">Kembali</a></li>
      </ol>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Edit sekolah</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal">
                <div class="form-group">
                  <label>nama sekolahan</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="form-group">
                  <label>alamat</label>
                  <textarea name="alamat1" class="form-control"><?php echo $data['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Profil</label>
                  <textarea name="profil" class="form-control"><?php echo $data['profil']; ?></textarea>
                </div>
                
                <div class="form-group">
                  <input type="submit" name="tambah" class="btn btn-primary" value="Edit">
                  <button type="reset" class="btn btn-info">Reset</button>
                  <a href="sekolah.php"><button type="button" class="btn btn-danger">Batal</button></a>
                </div>
              </form>
            </div>
          </div></div>
          
          <?php
          if ($_SESSION['admin']) {
          $user_login = $_SESSION['admin'];
          }elseif ($_SESSION['user']) {
          $user_login = $_SESSION['user'];
          }
          
          $nama=@$_POST['nama'];
          $alamat1=@$_POST['alamat1'];
          $profil=@$_POST['profil'];
          $tambah=@$_POST['tambah'];

          if($tambah){
              if($nama=="" || $alamat="" || $profil == ""){
              ?><script>alert("Data tidak boleh ada yang kosong");</script><?php
              }else{
              mysqli_query($koneksi,"UPDATE `sekolah` SET `nama` = '$nama', `alamat` = '$alamat1', `profil` = '$profil', `user_id` = '$user_login' WHERE `sekolah`.`id` = '$id'");
              ?><script>alert("Data berhasil diubah.");window.location.href="sekolah.php";</script><?php
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