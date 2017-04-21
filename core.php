<?php

    define('waktu', 'Asia/Jakarta');
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', 'root');
    define('DB',   'simaya_db');    

    ini_set('display_errors', 0);
    error_reporting(E_ALL ^ (E_NOTICE|E_STRICT));    
    
    session_start();
    
    date_default_timezone_set(waktu);
    setlocale(LC_MONETARY, 'id');

    $conn = new mysqli(HOST,USER,PASS);

    #CEK KONEKSI
    if ($conn->connect_error ) {
        die("Connection failed !" . $conn->connect_error);
    } 

    mysqli_select_db($conn, DB) or die ("Database not found !");