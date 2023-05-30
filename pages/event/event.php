<?php
session_start();
include "../inc/koneksi.php";
if(@$_SESSION['admin']){
?>
<!DOCTYPE html>
<html>
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
                <li class="active">Event</li>
                <li class="pull-right"><a href="../../">Kembali</a></li>
            </ol>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Event</h3>
                </div>
                <div class="panel-body">
                    <!--    <form class="form-inline pull-right">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Cari...">
                            <input type="submit" name="" class="btn btn-primary btn-md">
                        </div>
                    </form> -->
                    <a href="tambah.php"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus">   Tambah</span></button></a><br><br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Acara</th>
                                    <th>Tanggal</th>
                                    <th>Tempat</th>
                                    <th>Foto</th>
                                    <th>Lembaga</th>
                                    <th>Jumlah</th>
                                    <th>Nama Instruktur</th>
                                    <th>Jenis Event</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $query=mysqli_query($koneksi,"SELECT
                            event.nama,
                            event.tanggal,
                            event.tempat,
                            user.username,
                            status.status,
                            event.date,
                            event.id,
                            event.foto,
                            event.lembaga,
                            event.jumlah,
                            event.nama_instruktur,
                            jenis_event.jenis
                            FROM
                            event
                            INNER JOIN status ON (event.status_id = status.id)
                            INNER JOIN jenis_event ON (event.jenis_id = jenis_event.id)
                            INNER JOIN user ON (event.user_id = user.id)");
                            while($data=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td><?php echo substr($data['tempat'], 0,30)."..."; ?></td>
                                    <td><?php echo $data['foto']; ?></td>
                                    <td><?php echo $data['lembaga']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php echo $data['nama_instruktur']; ?></td>
                                    <td><?php echo $data['jenis']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
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
            header("location:../sesi.php");    
        }else{
        header("location:../../login.php");
        }
        ?>