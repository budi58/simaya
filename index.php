<?php
    
    /*mengeksekusi pengaturan aplikasi*/
    require ('core.php');

    /*jika session belum tersimpan*/
    if (!isset($_SESSION['uac'])) {
        /*ke form login*/
        header('location:login.php');

    }else{
        /*jika sudah login langsung ke aplikasi*/
        header('location:app.php');
    }
