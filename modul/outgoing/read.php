<?php
    if($_SESSION['uac'] == 'ADM'){
        include ('modul/outgoing/read_admin.php');
    }elseif($_SESSION['uac'] == 'KBG'){
        include ('modul/outgoing/read_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/outgoing/read_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/outgoing/read_kabaghumas.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/outgoing/read_sekwan.php');
    }else{
        echo "Koe Sopo?";
    }
?>