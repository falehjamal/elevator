<?php
session_start();
include "pages/inc/koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['admin']){
    header("location:index.php");
}else{

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Magang </title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/form-elements.css">
        <link rel="stylesheet" href="assets/bootstrap/css/style.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row" style="margin-top: -30px;">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Silahkan <strong>Login</strong>  dibawah ini</h1>
                        </div>
                    </div><?php
                                    if (@$_SESSION['admin']) {
                                        $user_login = $_SESSION['admin'];
                                    }elseif (@$_SESSION['user']) {
                                        $user_login = $_SESSION['user'];
                                    }
                                    
                                ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login </h3>
                                    <p>Masukkan username and password yang valid:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">

                            <div class="alert alert-info" style="margin-top:1em;" id="login-info" hidden>Silahkan <strong>login</strong> dengan akun anda<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

                            <?php
                       @$user=addslashes(@$_POST['user']);
                        @$pass=addslashes(@$_POST['pass']);
                        $login=@$_POST['login'];

                        if($login){
                            ?>
                                    <script type="text/javascript">
                                        $('#login-info').hide(4000);
                                    </script>
                                    <?php
                            if($user == "" || $pass == ""){
                                ?><script>alert("Username And Password tidak boleh kosong");</script><?php
                            }
                            else{
                                $query=mysqli_query($koneksi,"SELECT * FROM user WHERE (username = '$user' or email='$user') and password='$pass'");
                                $data=mysqli_fetch_array($query);
                                $cek=mysqli_num_rows($query);
                                if($cek == 1){
                                    $_SESSION['id']=$data['id'];
                                    $_SESSION['username']=$data['username'];
                                    if($data['level_id'] == "1"){
                                        $_SESSION['admin']=$data['id'];
                                        ?><div class="alert alert-success" style="margin-top:1em;" id="myalert">Anda berhasil login sebagai <strong>ADMIN</strong><a href="#" class="close" aria-label="close">&times;</a></div>
                                        <meta http-equiv="refresh" content="2; url=index.php"><?php
                                    }   
                                    else if($data['level_id'] == "2"){
                                        $_SESSION['user']=$data['id'];
                                        ?><div class="alert alert-success" style="margin-top:1em;" id="myalert">Anda berhasil login sebagai <strong>USER</strong><a href="#" class="close" aria-label="close">&times;</a></div>
                                        <meta http-equiv="refresh" content="2; url=index.php"><?php
                                    }
                                }else{
                                    ?><div class="alert alert-danger" style="margin-top:1em;" id="myalert"><STRONG>Username</STRONG> atau <strong>password</strong> salah !!!<a href="#" class="close" aria-label="close">&times;</a></div><?php
                                }

                            }
                        }

                     ?>
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="form-username">Email atau username</label>
                                        <input type="text" name="user" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-password">Password</label>
                                        <input type="password" name="pass" class="form-password form-control" id="form-password">
                                    </div>
                                    <input type="submit" class="btn btn-success" name="login" value="Login" id="login-btn">
                                </form>
                                              
                            </div>
                        </div>
                    </div>
                    
            </div>
            
        </div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
            
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#login-info').show(500).delay(2000).hide(500);
                    $('#form-username').focus();

                    $(".close").click(function(){
                         $("#myalert").hide(500);
                    });
                });
            </script>

    </body>
</html>

<?php 
}
 ?>
