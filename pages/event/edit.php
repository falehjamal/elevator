<?php
session_start();
include "../inc/koneksi.php";

$id=@$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM event WHERE id='$id'");
$dataa=mysqli_fetch_array($query);
$querys = mysqli_query($koneksi,"SELECT * FROM status");
$querye = mysqli_query($koneksi,"SELECT * FROM jenis_event");
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
    <title>IKITAS || Event</title>
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
      <li><a href="../../"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Event</li>
      <li class="active">Edit Event</li>
      <li class="pull-right"><a href="event.php">Kembali</a></li>
    </ol>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Edit Event</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Acara</label>
                  <input type="text" name="acara" class="form-control" value="<?php echo $dataa['nama'];?>">
                </div>
                <div class="form-group">
                  <label>Tanggal Acara</label>
                  <input type="date" name="tanggal" class="form-control" value="<?php echo $dataa['tanggal']; ?>">
                </div>
                <div class="form-group">
                  <label>Tempat</label>
                  <textarea name="tempat" class="form-control"><?php echo $dataa['tempat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="checkbox" name="ubah_file" value="true"> <span class="description">Checklist jika ingin mengubah
                  <input type="file" name="files" accept="image/*" class="form-control" value="<?php echo $dataa['foto']; ?>">
                </div>
                <div class="form-group">
                  <label>Lembaga</label>
                  <input type="text" name="lembaga" class="form-control" value="<?php echo $dataa['lembaga']; ?>">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="jumlah" class="form-control" value="<?php echo $dataa['jumlah']; ?>">
                </div>
                <div class="form-group">
                  <label>Nama Instruktur</label>
                  <input type="text" name="nama_instruktur" class="form-control" value="<?php echo $dataa['nama_instruktur']; ?>">
                </div>
                <div class="form-group">
                  <label>Jenis event</label>
                  <select name="jenis_event" class="form-control">
                    <?php while ($data=mysqli_fetch_array($querye)) {
                    ?>
                    <option value="<?php echo $data['id']; ?>" <?php if($data['id']==$dataa['jenis_id']){echo "selected";} ?>>
                      <?php echo $data['jenis']; ?>
                    </option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <?php while ($data=mysqli_fetch_array($querys)) {
                    ?>
                    <option value="<?php echo $data['id']; ?>" <?php if($data['id']==$dataa['status_id']){echo "selected";} ?>>
                      <?php echo $data['status']; ?>
                    </option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="submit" name="tambah" class="btn btn-primary" value="Edit">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="event.php"><button type="button" class="btn btn-info">Batal</button></a>
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

          $acara=@$_POST['acara'];
          $tanggal=@$_POST['tanggal'];
          $tempat=@$_POST['tempat'];
          $lembaga=@$_POST['lembaga'];
          $jumlah=@$_POST['jumlah'];
          $nama_instruktur=@$_POST['nama_instruktur'];
          $jenis_event=@$_POST['jenis_event'];
          $status=@$_POST['status'];
          $tanggall=date("Y-m-d H:i:s");

          $tambah=@$_POST['tambah'];

          if ($tambah) {
              if(isset($_POST['ubah_file'])){ 

                $foto = $_FILES['files']['name'];
                $tmp = $_FILES['files']['tmp_name'];
                
                $fotobaru = $foto;
                
                $path = "files/".$fotobaru;
                
                if(move_uploaded_file($tmp, $path)){ 

                  if(is_file("files/".$dataa['foto'])){
                    unlink("files/".$dataa['foto']); 
                  }
                    
                  $sql = mysqli_query($koneksi, "UPDATE `event` SET `nama` = '$acara', `tanggal` = '$tanggal', `tempat` = '$tempat', `foto` = '$fotobaru', `lembaga` = '$lembaga', `jumlah` = '$jumlah', `nama_instruktur` = '$nama_instruktur', `jenis_id` = '$jenis_event', `status_id` = '$status', `user_id` = '$user_login', `date` = '$tanggall' WHERE `event`.`id` = $id");
                  ?><script>alert("data atau file telah diubah");window.location.href="event.php";</script><?php 

                }else{
                  echo "Maaf, Gambar gagal untuk diupload.";
                }
              }else{ 
                $sql = mysqli_query($koneksi, "UPDATE `event` SET `nama` = '$acara', `tanggal` = '$tanggal', `tempat` = '$tempat', `lembaga` = '$lembaga', `jumlah` = '$jumlah', `nama_instruktur` = '$nama_instruktur', `jenis_id` = '$jenis_event', `status_id` = '$status', `user_id` = '$user_login', `date` = '$tanggall' WHERE `event`.`id` = $id");
                ?><script>alert("data telah diubah");window.location.href="event.php";</script><?php
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