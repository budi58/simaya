<?php
    if($_SESSION['uac'] == 'ADM') {
        include ('modul/incoming/review_admin.php');
    }elseif($_SESSION['uac'] == 'KSBG'){
        include ('modul/incoming/review_kasubag.php');
    }elseif($_SESSION['uac'] == 'KBG'){
        include ('modul/incoming/review_kabag.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/incoming/review_sekwan.php');
    }elseif($_SESSION['uac'] == 'DWN'){
        include ('modul/incoming/review_dewan.php');
    }else{
        echo "Koe Sopo?";
    }
?>
               