<?php
    if($_SESSION['uac'] == 'KSBG'){
        include ('modul/disposition/review_kasubag.php');
    }elseif($_SESSION['uac'] == 'KBG'){
        include ('modul/disposition/read_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/disposition/read_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/disposition/read_kabaghumas.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/disposition/read_sekwan.php');
    }else{
        echo "Koe Sopo?";
    }
?>