<?php
session_start();
include "../../inc/koneksi.php";
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
        <title>IKITAS || Siswa</title>
        <!-- Bootstrap Core CSS -->
        <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="../../../assets/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="../assets/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href='../assets/http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <!-- Template js -->
        <script src="../assets/js/jquery-2.1.1.min.js"></script>
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.appear.js"></script>
        <script src="../assets/js/contact_me.js"></script>
        <script src="../assets/js/jqBootstrapValidation.js"></script>
        <script src="../assets/js/modernizr.custom.js"></script>
        <script src="../assets/js/script.js"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{
                background-image: url("../../../images/background.jpg");
            }
        </style>
    </head>
    <head>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/font-awesome.min.css" rel="stylesheet">
    </head>
    <div class="container" style="margin-top: 10px;">
        
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="../../../"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Siswa</li>
                <li class="pull-right"><a href="../">Kembali</a></li>
            </ol>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Siswa</h3>
                </div>
                <div class="panel-body">
                    <a href="tambah.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus">   Tambah</span></button></a><br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Foto</th>
                                    <th>nama</th>
                                    <th>sekolah</th>
                                    <th>jurusan</th>
                                    <th>tanggal masuk</th>
                                    <th>tanggal keluar</th>
                                    <th>jenis kelamin</th>
                                    <th>user</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $query=mysqli_query($koneksi,"SELECT
                            jk.jk AS namajk,
                            siswa.foto,
                            siswa.nama AS namasiswa,
                            user.username AS user,
                            jurusan.nama AS namajurusan,
                            sekolah.nama AS namasekolah,
                            siswa.tgl_masuk,
                            siswa.tgl_keluar,
                            siswa.id
                            FROM
                            siswa
                            INNER JOIN user ON (user.id = siswa.user_id)
                            INNER JOIN sekolah ON (siswa.sekolah_id=sekolah.id)
                            INNER JOIN jk ON (siswa.jk_id = jk.id)
                            INNER JOIN jurusan ON (siswa.jurusan_id = jurusan.id)");
                            while($data=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    
                                    <td><?php echo $no++; ?></td>
                                    <td><img src="foto/<?php echo $data['foto']; ?>" width="50px" height="50px"></td>
                                    <td><?php echo $data['namasiswa']; ?></td>
                                    <td><?php echo $data['namasekolah']; ?></td>
                                    <td><?php echo $data['namajurusan']; ?></td>
                                    <td><?php echo $data['tgl_masuk']; ?></td>
                                    <td><?php echo $data['tgl_keluar']; ?></td>
                                    <td><?php echo $data['namajk']; ?></td>
                                    <td><?php echo $data['user']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $data['id']; ?>"><button class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                        <a onclick="return confirm('Apakah Anda Yakin ?')" href="delete.php?id=<?php echo $data['id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
                </div><!-- /.row -->
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
}elseif (@$_SESSION['user']) {
header("location:../../sesi.php");
}else{
  header("location:../../../login.php");
}
 ?>
