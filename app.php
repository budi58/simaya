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

    include ('fungsi.php');
    session_start();

    if(empty($_SESSION['uac'])) {
        header('location:login.php') ;
    } else {
        include ('core.php'); 
    }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>siMAYA - Sistem Informasi Manajemen Persuratan Maya</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">

    <?php require_once ('menu.php'); ?>
    
    <?php
        if(isset($_GET['p']) && strlen($_GET['p']) > 0) {
            $p=str_replace(".","/",$_GET['p']).".php";
        }else {
            $p="home.php";    
        }
        if(file_exists("modul/".$p)){
            include("modul/".$p);    
        }else {
            include("modul/home.php");   
        }  
    ?>
   
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range picker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

            });

            $('#datepicker .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: false,
                format: "dd/mm/yyyy",
                changeMonth: true,
                yearRange: "-30:+0",
                changeYear: true
            });
            
            $('#data_5 .input-daterange').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: false,
                format: "dd/mm/yyyy",
                //format: "yyyy/mm/dd",
                changeMonth: true,
                yearRange: "-30:+0",
                changeYear: true
            });


            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                    placeholder: "Select",
                    allowClear: true
                });
    

            <!--// Page Level Scripts -->

            /* Init DataTables */
            var oTable = $('#dataTables-example').DataTable();
            
        </script>

        <!--
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Responsive Admin Theme', 'Welcome to SIMAYA');

            }, 1300);

        });
        </script>
        -->

</body>
</html>
