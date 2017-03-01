<?php
    if($_SESSION['uac'] == 'KBG'){
        include ('modul/outgoing/reject_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/outgoing/reject_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/outgoing/reject_kabaghumas.php');
    }else{
        echo "Koe Sopo?";
    }
?>