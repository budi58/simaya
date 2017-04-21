<?php

/**
 * siMAYA
 * ------------------------------------------------------------------------
 * @package     siMAYA
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template     INSPINIA+ Admin Theme.
 */
 
    require( dirname( __FILE__ ) . '/core.php' );
    
    session_start();

    if($_SESSION['uac']) 
    {
        header('location:app.php');
    } else {
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>siMAYA - Log In</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            <!--
                <h3 class="logo-name">SM+</h3>
            -->
            </div>
            <h3>Selamat Datang di siMAYA</h3>
            <p>Ini adalah sistem manajemen persuratan berbasis web.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Masuk ke akun anda</p>
                <div style="color: rgba(102,117,127,0.6);">
                    <?php
                        error_reporting(0);
                        if($_GET['act']=='error'){
                        echo "The username and password did not match.";
                        }
                    ?>
                </div>
            <form class="m-t" role="form" method="post" action="auth.php">
                <div class="form-group">
                    <input name="uname" type="text" class="form-control" placeholder="Username" required="" autocomplete="off" autofocus="" maxlength="32">
                </div>
                <div class="form-group">
                    <input name="upsw" type="password" class="form-control" placeholder="Password" required="" autocomplete="off" maxlength="32">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="auth">Login</button>

                <!--<a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form> 
            <p class="m-t"> <small>Sekretariat DPRD Kabupaten Pati &copy; <?php echo date("Y") ?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
?>
