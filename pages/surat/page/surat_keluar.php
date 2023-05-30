<?php
session_start();
include "../../inc/koneksi.php";
if(@$_SESSION['admin']) {
?>
<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
        <script src="../../../assets/js/jquery-2.1.1.min.js"></script>
    
    <style type="text/css">
    body{
    background-image: url("../../../images/background.jpg");
    }
    </style>
</head>

<div class="container" style="margin-top: 10px;">
    
    <div class="row">

    <ol class="breadcrumb">
        <li><a href="../../../"><i class="fa fa-home"></i>  Home</a></li>
        <li class="active">Surat</li>
        <li class="active">surat keluar</li>
        <li class="pull-right"><a href="../">Kembali</a></li>
    </ol>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Surat keluar</h3>
            </div>
            <div class="panel-body">
                <a href="tambah_keluar.php"><button type="button" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus">   Tambah</span></button></a><br><br>
                <div class="table-responsive">
                    <table class="table table-striped" id="example">
                        <thead>
                            
                            <tr>
                                <th>NO</th>
                                <th>lembaga</th>
                                <th>NO surat</th>
                                <td>Tanggal</td>
                                <th>Status</th>
                                <th>Prihal</th>
                                <th>User</th>
                                <th>File</th>
                                <th>Date</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        $query=mysqli_query($koneksi,"SELECT
                        `surat_masuk`.`lembaga`,
                        `status`.`status`,
                        `surat_masuk`.`no_surat`,
                        `surat_masuk`.`tanggal_surat`,
                        `surat_masuk`.`prihal`,
                        `surat_masuk`.`user_id`,
                        user.username,
                        surat_masuk.id,
                        surat_masuk.file,
                        surat_masuk.date
                        
                        FROM
                        `surat_masuk`
                        INNER JOIN `status` ON (`surat_masuk`.`status_id` = `status`.`id`)
                        INNER JOIN user ON (`surat_masuk`.`user_id` = `user`.`id`) WHERE surat_masuk.status_id=2");
                        while($data=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['lembaga']; ?></td>
                                <td><?php echo $data['no_surat']; ?></td>
                                <td><?php echo $data['tanggal_surat']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td><?php echo $data['prihal']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['file']; ?></td>
                                <td><?php echo $data['date']; ?></td>
                                <td>
                                    <a href="read_keluar.php?id=<?php echo $data['id']; ?>"><button class="btn btn-primary btn-xs" title="Ubah"><span class="glyphicon glyphicon-zoom-in"></span></button></a>
                                    <a href="edit_keluar.php?id=<?php echo $data['id']; ?>"><button class="btn btn-info btn-xs" title="Ubah"><span class="glyphicon glyphicon-pencil"></span></button></a>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')" href="hapus_keluar.php?id=<?php echo $data['id']; ?>"><button class="btn btn-danger btn-xs" title="Hapus"><span class="glyphicon glyphicon-trash"></span></button></a>
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
        }
        else{
        header("location:../../../login.php");
        }
        ?>