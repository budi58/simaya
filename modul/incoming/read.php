<?php
    if($_SESSION['uac'] == 'ADM') {
        include ('modul/incoming/read_admin.php');
    }elseif($_SESSION['uac'] == 'KSBG'){
        include ('modul/incoming/read_kasubag.php');
    }elseif($_SESSION['uac'] == 'KBG'){
        include ('modul/incoming/read_kabag.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/incoming/read_sekwan.php');
    }elseif($_SESSION['uac'] == 'DWN'){
        include ('modul/incoming/read_dewan.php');
    }else{
        echo "Koe Sopo?";
    }
?>
               