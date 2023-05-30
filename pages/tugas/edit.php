<?php
session_start();
include "../inc/koneksi.php";
$id = $_GET['id'];
$querys = mysqli_query($koneksi,"SELECT * FROM siswa");
$query = mysqli_query($koneksi,"SELECT * FROM projek WHERE id=$id");
$dataa = mysqli_fetch_array($query);
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
		<title>IKITAS || Tugas</title>
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
				<li class="active">Tugas</li>
				<li class="active">Tambah Tugas</li>
				<li class="pull-right"><a href="index.php">Kembali</a></li>
			</ol>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Tambah Tugas</h3>
				</div>
				<div class="panel-body">
					<div class="container">
						<div class="col-lg-4">
							<form method="post" class="form-horizontal" action="">
								<div class="form-group">
									<label>Nama</label>
									<select name="nama" class="form-control">
										<?php while ($data=mysqli_fetch_array($querys)) {
										?>
										<option value="<?php echo $data['id']; ?>" <?php if($data['id']==$dataa['nama_id']){echo "selected";} ?>>
											<?php echo $data['nama']; ?>
										</option>
										<?php }?>
									</select>
								</div>
								<div class="form-group">
									<label>Projek</label>
									<input type="text" name="projek" class="form-control" value="<?php echo $dataa['projek']; ?>">
								</div>
								<div class="form-group">
									<label>Pembimbing</label>
									<input type="text" name="pembimbing" value="<?php echo $dataa['pembimbing']; ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control">
										<option value="sedang proses">Sedang proses</option>
										<option value="selesai">Selesai</option>
									</select>
								</div>
								<?php
									if (@$_SESSION['admin']) {
										$user_login = $_SESSION['admin']=1;
									}elseif (@$_SESSION['user']) {
										$user_login = $_SESSION['user']=2;
									}
								
									
								?>
								<div class="form-group">
									<input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
									<button type="reset" class="btn btn-danger">Reset</button>
									<a href="index.php"><button type="button" class="btn btn-info">Batal</button></a>
								</div>
							</form>
						</div>
					</div>
					
					<?php
					$nama=@$_POST['nama'];
					$projek=@$_POST['projek'];
					$pembimbing=@$_POST['pembimbing'];
					$status=@$_POST['status'];

					$tambah=@$_POST['tambah']; 
					if($tambah){
						if($nama=="" || $projek=="" || $pembimbing=="" || $status=="" ){
					?><script>alert("Data tidak boleh ada yang kosong");</script><?php
					}else{
					mysqli_query($koneksi,"UPDATE `projek` SET `nama_id` = '$nama', `projek` = '$projek', `pembimbing` = '$pembimbing', `status` = '$status' WHERE `projek`.`id` = $id");
					?>
					<script>alert("Data berhasil diubah.");window.location.href="index.php";</script>
					<?php
					}
					}
					?>
					<?php
					}else{
					header("location:../../login.php");
					}
					?>