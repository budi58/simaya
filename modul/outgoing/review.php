<?php
    if($_SESSION['uac'] == 'ADM') {
        include ('modul/outgoing/review_admin.php');
    }elseif($_SESSION['uac'] == 'KBG'){
        include ('modul/outgoing/review_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/outgoing/review_kabag.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/outgoing/review_kabag.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/outgoing/review_sekwan.php');
    }else{
        echo "Koe Sopo?";
    }
?>
               