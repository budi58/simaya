<?php
    if($_SESSION['uac'] == 'ADM') {
        include ('modul/disposition/view_admin.php');
    }elseif($_SESSION['uac'] == 'KSBG'){
        include ('modul/disposition/review_kasubag.php');
    }elseif($_SESSION['uac'] == 'KBG'){
        include ('modul/disposition/review_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/disposition/review_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/disposition/review_kabaghumas.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/disposition/review_sekwan.php');
    }elseif($_SESSION['uac'] == 'DWN'){
        include ('modul/disposition/review_ketua.php');
    }else{
        echo "Koe Sopo?";
    }
?>
               