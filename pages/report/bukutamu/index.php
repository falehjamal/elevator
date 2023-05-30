  <?php
session_start();
include "../../inc/koneksi.php";
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
        <title>IKITAS || Buku tamu</title>
        <!-- Bootstrap Core CSS -->
        <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome CSS -->
        <link href="../../../../assets/css/font-awesome.min.css" rel="stylesheet">
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
        <li><a href="../../../"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Report</li>
        <li class="pull-right"><a href="../">Kembali</a></li>
    </ol>
   
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Report Bukutamu Bulan ini</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                        <table border="0" cellspacing="5" cellpadding="5">
                            <tbody><tr>
                                <td>Tanggal minimal:</td>
                                <td><input type="number" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>Tanggal maksimal:</td>
                                <td><input type="number" id="max" name="max"></td>
                            </tr>
                        </tbody></table><br>
               
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Dari Lembaga</th>
                                <th>No.Telepon</th>
                                <th>Email</th>
                                <th>Keterangan</th>
                                <th>Tanggal kunjungan</th>
                                <th>Tanggal Tersimpan</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $query=mysqli_query($koneksi,"SELECT
                            *
                            FROM
                            buku_tamu
                            INNER JOIN `user` ON (`buku_tamu`.`user_id` = `user`.`id`)
                            INNER JOIN `level` ON (`user`.`level_id` = `level`.`id`)");
                            while($data=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['lembaga']; ?></td>
                                <td><?php echo $data['no_tlp']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td><?php echo $data['tanggal2']; ?></td>
                                <td><?php echo $data['level']; ?></td>
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

        $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[7] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
        return true;
        }
        return false;
        }
        );
        
        $(document).ready(function() {
        var table = $('#example').DataTable();
        
        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').keyup( function() {
            table.draw();
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