<?php

    foreach([

            /*PENGATURAN ZONA WAKTU*/
            'waktu' => 'Asia/Jakarta',       
            
             /*koneksi ke database server*/
            'host' => 'localhost',
            'user' => 'root',
            'pass' => 'root',
            'db'   => 'simaya_db',

        ] as $_keydata => $_valdata) define($_keydata, $_valdata);



    ini_set('display_errors', 0);
    error_reporting(E_ALL ^ (E_NOTICE|E_STRICT));    
    
    session_start();
    
    date_default_timezone_set(waktu);
    setlocale(LC_MONETARY, 'id');

    $conn = new mysqli(host,user,pass,db);

    #CEK KONEKSI
    if ($conn->connect_error) {
        die("Koneksi Gagal : " . $conn->connect_error);
    } 