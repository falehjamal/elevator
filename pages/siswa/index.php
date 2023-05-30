<?php 
session_start();
include "../inc/koneksi.php";
if (@$_SESSION['admin']) {
 
 ?>
       <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>IKITAS || Siswa</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="../../assets/css/animate.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/css/style.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='../../assets/http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

       
        <!-- Template js -->
        <script src="../../assets/js/jquery-2.1.1.min.js"></script>
        <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/js/jquery.appear.js"></script>
        <script src="../../assets/js/contact_me.js"></script>
        <script src="../../assets/js/jqBootstrapValidation.js"></script>
        <script src="../../assets/js/modernizr.custom.js"></script>
        <script src="../../assets/js/script.js"></script>

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

    </head>
    <body>

      <div class="mainbody-section text-center" style="margin-top: 14em;">

            <div class="container">
             
                <div class="row" style="margin-left: 9em;">
                    <div class="col-md-5">
                    
                        <div class="menu-item light-red">
                            <a href="../../" data-toggle="modal">
                                <i class="fa fa-home"></i>
                                <p>Home</p>
                            </a>
                        </div>      
                    </div>
                    <div class="col-md-5">
                    
                        <div class="menu-item green">
                            <a href="siswa/siswa.php" data-toggle="modal">
                                <i class="fa fa-user"></i>
                                <p>siswa</p>
                            </a>
                        </div>      
                    </div>
                  <div class="col-md-5">
                        
                        <div class="menu-item light-orange">
                            <a href="sekolah/sekolah.php" data-toggle="modal">
                                <i class="fa fa-university"></i>
                                <p>sekolah</p>
                            </a>
                        </div>
                    </div>   
                    <div class="col-md-5">
                        
                        <div class="menu-item blue">
                            <a href="jurusan/jurusan.php" data-toggle="modal">
                                <i class="fa fa-random"></i>
                                <p>jurusan</p>
                            </a>
                        </div>
                    </div>   
            </div>
        </div>
                    
                    
</body>
<?php 
}elseif (@$_SESSION['user']) {
header("location:../sesi.php");
}else{
  header("location:../../login.php");
}
 ?>
