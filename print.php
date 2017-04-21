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

	session_start();
    //require ('fungsi.php');
    require( dirname( __FILE__ ) . '/fungsi.php' );

    if (empty($_SESSION['uac']) ) {
        header('location:login.php') ;
    } else {
        //require ('core.php');
        require( dirname( __FILE__ ) . '/core.php' );
    }

    if (isset($_GET['s']) && strlen($_GET['s']) > 0 ) {
	   $rdr = str_replace(".","/",$_GET['s']).".php";
    } else {
	   $rdr ="home.php";
    }
    if(file_exists("modul/".$rdr) )
    {
	   include("modul/".$rdr);
    } else {
	   include("modul/home.php");
    }
?>