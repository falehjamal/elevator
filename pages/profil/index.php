<?php
session_start();
include "../inc/koneksi.php";
if (@$_SESSION['admin']) {
		$user_login = $_SESSION['admin'];
	}elseif (@$_SESSION['user']) {
		$user_login = $_SESSION['user'];
	}
$user_id=$_SESSION['id'];
$query = mysqli_query($koneksi,"SELECT * FROM user INNER JOIN level ON user.level_id=level.id WHERE user.id='$user_id'");
$data = mysqli_fetch_array($query);
if(@$_SESSION['admin'] || @$_SESSION['user']){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>IKITAS || Pengguna</title>
		<!-- Bootstrap Core CSS -->
		<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome CSS -->
		<link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
		<script src="../../assets/js/jquery-2.1.1.min.js"></script>
		
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
				<li class="active">Profil</li>
				<li class="pull-right"><a href="../../">Kembali</a></li>
			</ol>
			<?php if (@$_SESSION['admin']) { ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Data pribadi anda</h3>
				</div>
				<div class="panel-body">
					<div class="table responsive">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
											<input type="text" name="first_name" class="form-control input-lg" value="<?php echo $data['nama_lengkap']; ?>" disabled>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
											<input type="text" name="first_name" class="form-control input-lg" value="<?php echo $data['email']; ?>" disabled>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
											<input type="email" name="email"  class="form-control input-lg" value="<?php echo $data['username']; ?>" disabled>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-link" aria-hidden="true"></i></span>
											<input type="email" name="email"  class="form-control input-lg" value="<?php echo $data['level']; ?>" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div><!-- /.row -->
				<!-- table -->
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Semua Pengguna</h3>
						</div>
						<div class="panel-body">
							<a href="tambah.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus">   Tambah</span></button></a><br><br>
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th>NO</th>
											<th>E-mail</th>
											<th>Nama lengkap</th>
											<th>Username</th>
											<th>Password</th>
											<th>level user</th>
											<th>Created_at</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										$querys=mysqli_query($koneksi,"SELECT 
											user.id,
											user.email,
											user.nama_lengkap,
											user.username,
											user.password,
											user.date,
											level.level
										 FROM user INNER JOIN level ON user.level_id=level.id");
										while($data=mysqli_fetch_array($querys)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $data['email']; ?></td>
											<td><?php echo $data['nama_lengkap']; ?></td>
											<td><?php echo $data['username']; ?></td>
											<td><?php echo $data['password']; ?></td>
											<td><?php echo $data['level']; ?></td>
											<td><?php echo $data['date']; ?></td>
											<td>
												<a href="edit.php?id=<?php echo $data['id']; ?>"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
												<a onclick="return confirm('Yakin ingin menghapus?')" href="delete.php?id=<?php echo $data['id'];?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>
											</td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-8">
						</div>
					</div>
					<!-- admin -->
				<?php
				}elseif (@$_SESSION['user']) {
				?>
					<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Data pribadi anda</h3>
				</div>
				<div class="panel-body">
					<div class="table responsive">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
											<input type="text" name="first_name" class="form-control input-lg" value="<?php echo $data['nama_lengkap']; ?>" disabled>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
											<input type="text" name="first_name" class="form-control input-lg" value="<?php echo $data['email']; ?>" disabled>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
											<input type="email" name="email"  class="form-control input-lg" value="<?php echo $data['username']; ?>" disabled>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="input-group">
											<span class="input-group-addon" id="basic-addon1"><i class="fa fa-link" aria-hidden="true"></i></span>
											<input type="email" name="email"  class="form-control input-lg" value="<?php echo $data['level']; ?>" disabled>
										</div>
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info">
								<i>Jika lupa password silahkan hubungi admin IKITAS. "admin@ikitas.com"</i>
							</div>
						</div>
						</div>
					</div>
				</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
        </script>
		<?php
		}else{
		header("location:../../login.php");
		}
		?>