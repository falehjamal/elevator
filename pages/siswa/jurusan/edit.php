<?php
session_start();
include "../../inc/koneksi.php";
$id = @$_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE id='$id'");
$data = mysqli_fetch_array($query);
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
		<title>IKITAS || Jurusan</title>
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
			<li class="active">Event</li>
			<li class="active">Tambah Event</li>
			<li class="pull-right"><a href="jurusan.php">Kembali</a></li>
		</ol>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Event</h3>
				</div>
				<div class="panel-body">
					<div class="container">
						<div class="col-lg-4">
							<form method="post" class="form-horizontal" action="">
								<div class="form-group">
									<label>Jurusan</label>
									<input type="text" name="jurusan" class="form-control" value="<?php echo $data['nama']; ?>">
								</div>
								<div class="form-group">
									<input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
									<button type="reset" class="btn btn-danger">Reset</button>
									<a href="jurusan.php"><button type="button" class="btn btn-info">Batal</button></a>
								</div>
							</form>
						</div>
					</div>
					
					<?php
					$jurusan=@$_POST['jurusan'];
					$tambah=@$_POST['tambah'];
					if($tambah){
						if($jurusan==""){
					?><script>alert("Data tidak boleh ada yang kosong");</script><?php
					}else{
					mysqli_query($koneksi,"UPDATE `jurusan` SET `nama` = '$jurusan' WHERE `id` = '$id'") or die(mysqli_error($koneksi));
					?>

					<script>alert("Data berhasil diubah.");window.location.href="jurusan.php";</script>

					<?php
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