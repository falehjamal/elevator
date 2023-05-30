<?php
session_start();
include "../../inc/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM surat_masuk WHERE id=$id");
$data = mysqli_fetch_array($query);
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
    <title>IKITAS || Read Surat masuk</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="../../../assets/css/font-awesome.min.css" rel="stylesheet">
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
        <li class="active">Read surat masuk</li>
        <li class="pull-right"><a href="surat_masuk.php">Kembali</a></li>
    </ol>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Read Surat masuk</h3>
            </div>
            <div class="panel-body">
                <div class="table responsive">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Lembaga</span>
                                            <input type="text" name="first_name" class="form-control " value="<?php echo $data['lembaga']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">No surat</span>
                                            <input type="text" name="first_name" class="form-control " value="<?php echo $data['no_surat']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Tanggal surat</span>
                                            <input type="email" name="email"  class="form-control " value="<?php echo $data['tanggal_surat']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">File</span>
                                            <input type="email" name="email"  class="form-control " value="<?php echo $data['file']; ?>" disabled>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Perihal</span>
                                            <textarea class="form-control" disabled><?php echo $data['prihal']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="col-md-8">
            </div>

            </div>
            </div><!-- /.row -->
        </div>

        <?php
        }elseif (@$_SESSION['user']) {
        header("location:../../sesi.php");
        }
        else{
        header("location:../../../login.php");
        }
        ?>