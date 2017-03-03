<?php
    if($_SESSION['uac'] == 'KBG'){
        include ('modul/disposition/read_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/disposition/read_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/disposition/read_kabaghumas.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/disposition/read_sekwan.php');
    }elseif($_SESSION['uac'] == 'KOMA'){
        include ('modul/disposition/read_komisi_a.php');
    }elseif($_SESSION['uac'] == 'KOMB'){
        include ('modul/disposition/read_komisi_b.php');
    }elseif($_SESSION['uac'] == 'KOMC'){
        include ('modul/disposition/read_komisi_c.php');
    }elseif($_SESSION['uac'] == 'KOMD'){
        include ('modul/disposition/read_komisi_d.php');
    }else{
        echo "Koe Sopo?";
    }
?>