<?php
    if($_SESSION['uac'] == 'KBG'){
        include ('modul/disposition/review_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/disposition/review_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/disposition/review_kabaghumas.php');
    }elseif($_SESSION['uac'] == 'SWN'){
        include ('modul/disposition/review_sekwan.php');
    }elseif($_SESSION['uac'] == 'KOMA'){
        include ('modul/disposition/review_komisi_a.php');
    }elseif($_SESSION['uac'] == 'KOMB'){
        include ('modul/disposition/review_komisi_b.php');
    }elseif($_SESSION['uac'] == 'KOMC'){
        include ('modul/disposition/review_komisi_c.php');
    }elseif($_SESSION['uac'] == 'KOMD'){
        include ('modul/disposition/review_komisi_d.php');
    }else{
        echo "Koe Sopo?";
    }
?>
               