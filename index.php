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

    /** load pengaturan aplikasi */
    require( dirname( __FILE__ ) . '/core.php' );

    /** cek session */
    if ( !isset($_SESSION['uac']) ) {
        /** ke form login*/
        header('location:login.php');

    }else{
        /** jika sudah login langsung ke aplikasi*/
        header('location:app.php');
    }
