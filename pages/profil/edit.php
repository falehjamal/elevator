<?php
session_start();
include "../inc/koneksi.php";
$id=$_GET['id'];
$query= mysqli_query($koneksi,"SELECT * FROM user WHERE id=$id");
$dataa = mysqli_fetch_array($query);
$querys= mysqli_query($koneksi,"SELECT * FROM level");
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
							<form method="post" class="form-horizontal" action="">
								<div class="form-group">
									<label>E-mail</label>
									<input type="email" name="email" class="form-control" value="<?php echo $dataa['email']; ?>">
								</div>
								<div class="form-group">
									<label>Nama lengkap</label>
									<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $dataa['nama_lengkap']; ?>">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" value="<?php echo $dataa['username']; ?>">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" value="<?php echo $dataa['password']; ?>">
								</div>
								<div class="form-group">
									<label>Level user</label>
									<select name="level" class="form-control">
										<?php while ($data=mysqli_fetch_array($querys)) {
										?>
										<option value="<?php echo $data['id']; ?>" <?php if($data['id']==$dataa['level_id']){echo "selected";} ?>>
											<?php echo $data['level']; ?>
										</option>
										<?php }?>
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
									<input type="submit" name="tambah" class="btn btn-primary" value="Ubah">
									<button type="reset" class="btn btn-danger">Reset</button>
									<a href="index.php"><button type="button" class="btn btn-info">Batal</button></a>
								</div>
							</form>
						</div>
					</div>
					
					<?php
					$email=@$_POST['email'];
					$nama_lengkap=@$_POST['nama_lengkap'];
					$username=@$_POST['username'];
					$password=@$_POST['password'];
					$level=@$_POST['level'];
					$tanggall=date("d-m-Y");	
					$tambah=@$_POST['tambah']; 
					if($tambah){
						if($email=="" || $nama_lengkap=="" || $username=="" || $password=="" || $level==""){
					?><script>alert("Data tidak boleh ada yang kosong");</script><?php
					}else{
					mysqli_query($koneksi,"UPDATE `user` SET `email` = '$email', `nama_lengkap` = '$nama_lengkap', `username` = '$username', `password` = '$password', `level_id` = '$level', `date` = '$tanggall' WHERE `user`.`id` = $id");
					?>
					<script>alert("Data berhasil diubah.");window.location.href="index.php";</script>
					<?php
					}
					}
					?>
					<?php
					}elseif(@$_SESSION['user']){
					header("location:../../login.php");
					}else{
					header("location:../../login.php");
					}
					?>