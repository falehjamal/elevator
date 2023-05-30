<?php
session_start();
include 'pages/inc/koneksi.php';
include "header.php";
if(@$_SESSION['admin'] || @$_SESSION['user']){
?>
<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
<body>
    
    <!-- Start Logo Section -->
    <section id="logo-section" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo text-center">
                        <h1 style="font-family: arial;">IKITAS Application System</h1>
                        <span>Incubator Kreasi & Inovasi Telematika Semarang</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Logo Section -->
    
    
    <!-- Start Main Body Section -->
    <div class="mainbody-section text-center">
        <div class="container">
            <div class="row">
                
                <div class="col-md-3">
                    
                    <div class="menu-item blue">
                        <a href="pages/surat/index.php" data-toggle="modal">
                            <i class="fa fa-envelope"></i>
                            <p>Surat</p>
                        </a>
                    </div>
                    
                    <div class="menu-item green">
                        <a href="pages/event/event.php">
                            <i class="fa fa-calendar"></i>
                            <p>Event</p>
                        </a>
                    </div>
                    
                    <div class="menu-item light-red">
                        <a href="pages/siswa/index.php" data-toggle="modal">
                            <i class="fa fa-users"></i>
                            <p>Siswa</p>
                        </a>
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    
                    <!-- Start Carousel Section -->
                    <div class="home-slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding-bottom: 30px;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="images/ikitas .png" class="img-responsive" alt="">
                                </div>
                                <div class="item">
                                    <img src="images/ikitas1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="item">
                                    <img src="images/ikitas2.png" class="img-responsive" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Carousel Section -->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="menu-item color responsive">
                                <a href="pages/report/">
                                    <i class="fa fa-print"></i>
                                    <p>Report</p>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="menu-item blue responsive-2">
                                <a href="pages/tugas/">
                                    <i class="fa fa-file-o"></i>
                                    <p>Tugas siswa</p>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="col-md-3">
                    
                    <div class="menu-item light-red">
                        <a href="pages/bukutamu" data-toggle="modal">
                            <i class="fa fa-book"></i>
                            <p>Buku Tamu</p>
                        </a>
                    </div>
                    
                    <div class="menu-item color">
                        <a href="pages/profil/" data-toggle="modal">
                            <i class="fa fa-user"></i>
                            <p>Pengguna</p>
                        </a>
                    </div>
                    <?php
                    if (@$_SESSION['admin']) {
                    $user_login = $_SESSION['admin']="admin";
                    }elseif (@$_SESSION['user']) {
                    $user_login = $_SESSION['user']="user";
                    }
                    ?>
                    <div class="menu-item light-orange">
                        <a onclick="sweet()">
                            <i class="fa fa-sign-out"></i>
                            <p> Logout</p>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Body Section -->
    
    <!-- Start Copyright Section -->
    <div class="copyright text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>Developed by <a href="https://www.facebook.com/falehjamal/" target="_blank"> Anak Magang </a>Supported   <a href="http://ikitas.com/" target="blank">IKITAS</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Section -->
    <script src="assets/js/sweetalert.min.js"></script>
    <script type="text/javascript">
    function sweet(){
        swal({
                title: "Yakin ingin LOGOUT?",
                text: "kamu akan mengakhiri SESSION",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                 if (isConfirm) {
                window.location.href='logout.php';
                } else {
                swal("Kembali", "Anda belum logout", "info");
            }
        });
    }
    </script>
    
    <?php
    }else{
    header("location:login.php");
    }
    ?>