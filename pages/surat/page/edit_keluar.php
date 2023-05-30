<?php
session_start();
include "../../inc/koneksi.php";
$id=@$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * FROM surat_masuk WHERE id='$id'");
$dataa=mysqli_fetch_array($query);
$querys = mysqli_query($koneksi,"SELECT * FROM status WHERE id=2");
if (@$_SESSION['admin'])  {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IKITAS || Surat keluar</title>
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
        <li class="active">Surat keluar</li>
        <li class="pull-right"><a href="surat_keluar.php">Kembali</a></li>
      </ol>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Edit Surat keluar</h3>
        </div>
        <div class="panel-body">
          <div class="container">
            <div class="col-lg-4">
              <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Lembaga</label>
                  <input type="text" name="lembaga" class="form-control" value="<?php echo $dataa['lembaga']; ?>">
                </div>
                <div class="form-group">
                  <label>No Surat</label>
                  <input type="number" name="no_surat" class="form-control" value="<?php echo $dataa['no_surat']; ?>">
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
                  <label>Prihal</label>
                  <textarea name="perihal" class="form-control"><?php echo $dataa['prihal']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>File</label>
                    <input type="checkbox" name="ubah_file" value="true"> <span class="description">Checklist jika ingin mengubah file</span>
                  <input type="file" name="files" accept="application/pdf,image/*" class="form-control" value="<?php echo $dataa['file']; ?>">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" value="<?php echo $dataa['tanggal_surat']; ?>">
                </div>
                
                <div class="form-group">
                  <input type="submit" name="edit" class="btn btn-primary" value="Ubah">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="surat_keluar.php"><button type="button" class="btn btn-info">Batal</button></a>
                </div>
              </form>
            </div>
          </div>
          
          <?php
          if ($_SESSION['admin']) {
          $user_login = $_SESSION['admin']=1;
          }elseif ($_SESSION['user']) {
          $user_login = $_SESSION['user']=2;
          }
          
          $lembaga=@$_POST['lembaga'];
          $no_surat=@$_POST['no_surat'];
          $tanggal = @$_POST['tanggal'];
          $date=date("d-m-Y");
          $status=@$_POST['status'];
          $perihal=@$_POST['perihal'];

          $edit=@$_POST['edit'];

          if ($edit) {
              if(isset($_POST['ubah_file'])){ 

                $foto = $_FILES['files']['name'];
                $tmp = $_FILES['files']['tmp_name'];
                
                $fotobaru = $foto;
                
                $path = "../files/".$fotobaru;
                
                if(move_uploaded_file($tmp, $path)){ 

                  if(is_file("../files/".$dataa['files'])){
                    unlink("../files/".$dataa['files']); 
                  }
                    
                  $sql = mysqli_query($koneksi, "UPDATE `surat_masuk` SET `lembaga` = '$lembaga', `no_surat` = '$no_surat', `tanggal_surat` = '$tanggal', `status_id` = '$status', `prihal` = '$perihal', `user_id` = '$user_login', `file` = '$fotobaru', `date` = '$date' WHERE `surat_masuk`.`id` = '$id'");
                  ?><script>alert("data atau file telah diubah");window.location.href="surat_keluar.php";</script><?php 

                }else{
                  echo "Maaf, Gambar gagal untuk diupload.";
                  echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
                }
              }else{ 
                $sql = mysqli_query($koneksi, "UPDATE `surat_masuk` SET `lembaga` = '$lembaga', `no_surat` = '$no_surat', `tanggal_surat` = '$tanggal', `status_id` = '$status', `prihal` = '$perihal', `user_id` = '$user_login', `date` = '$date' WHERE `surat_masuk`.`id` = '$id'");
                ?><script>alert("data telah diubah");window.location.href="surat_keluar.php";</script><?php
              }
            }
              ?>

<?php 
}elseif (@$_SESSION['user']) {
header("location:../../sesi.php");
}
else{
  header("location:../../../login.php");
 }
 ?>
