<?php
session_start();
include "../inc/koneksi.php";
$querys = mysqli_query($koneksi,"SELECT * FROM status");
$querye = mysqli_query($koneksi,"SELECT * FROM jenis_event");
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
		<title>IKITAS || Event</title>
		<!-- Bootstrap Core CSS -->
		<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome CSS -->
		<link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
		

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
				<li class="active">Tambah Event</li>
				<li class="pull-right"><a href="event.php">Kembali</a></li>
			</ol>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Event</h3>
				</div>
				<div class="panel-body">
					<div class="container">
						<div class="col-lg-4">
							<form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label>Acara</label>
									<input type="text" name="acara" class="form-control">
								</div>
								<div class="form-group">
									<label>Tanggal Acara</label>
									<input type="date" name="tanggal" class="form-control">
								</div>
								<div class="form-group">
									<label>Tempat</label>
									<textarea name="tempat" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto" accept="image/*" class="form-control">
								</div>
								<div class="form-group">
									<label>Lembaga</label>
									<input type="text" name="lembaga" class="form-control">
								</div>
								<div class="form-group">
									<label>Jumlah</label>
									<input type="number" name="jumlah" class="form-control">
								</div>
								<div class="form-group">
									<label>Nama Instruktur</label>
									<input type="text" name="nama_instruktur" class="form-control">
								</div>
								<div class="form-group">
									<label>Jenis event</label>
									<select name="jenis_event" class="form-control">
										<?php while ($data=mysqli_fetch_array($querye)) {
										?>
										<option value="<?php echo $data['id']; ?>">
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
										<option value="<?php echo $data['id']; ?>">
											<?php echo $data['status']; ?>
										</option>
										<?php }?>
									</select>
								</div>
								<?php
									if (@$_SESSION['admin']) {
										$user_login = $_SESSION['admin'];
									}elseif (@$_SESSION['user']) {
										$user_login = $_SESSION['user'];
									}

								
									
								?>
								<div class="form-group">
									<input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
									<button type="reset" class="btn btn-danger">Reset</button>
									<a href="event.php"><button type="button" class="btn btn-info">Batal</button></a>
								</div>
							</form>
						</div>
					</div>
					
					<?php
					$acara=@$_POST['acara'];
					$tanggal=@$_POST['tanggal'];
					$tempat=@$_POST['tempat'];
					$lembaga=@$_POST['lembaga'];
					$jumlah=@$_POST['jumlah'];
					$nama_instruktur=@$_POST['nama_instruktur'];
					$jenis_event=@$_POST['jenis_event'];
					$status=@$_POST['status'];
					$tanggall=date("d-m-Y");

					$sumber = @$_FILES['foto']['tmp_name'];
			        $target = 'files/';
			        $nama_file = @$_FILES['foto']['name'];

					$tambah=@$_POST['tambah']; 
					if($tambah){
						if($acara=="" || $tanggal=="" || $tempat=="" || $status=="" || $lembaga==""  || $jumlah==""  || $nama_instruktur==""  || $jenis_event==""){
					?><script>alert("Data tidak boleh ada yang kosong");</script><?php
					}else{
          			$pindah = move_uploaded_file($sumber, $target.$nama_file);
          			if ($pindah) {
          				
					mysqli_query($koneksi,"INSERT INTO `event` (`id`, `nama`, `tanggal`, `tempat`, `foto`, `lembaga`, `jumlah`, `nama_instruktur`, `jenis_id`, `status_id`, `user_id`, `date`) VALUES (NULL, '$acara', '$tanggal', '$tempat', '$nama_file', '$lembaga', '$jumlah', '$nama_instruktur', '$jenis_event', '$status', '$user_login', '$tanggall')");
					?>
					<script>alert("Data berhasil ditambahkan.");window.location.href="event.php";</script>
					<?php
						}else{
							?><script>alert("Foto tidak bisa diupload");</script><?php
						}	
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