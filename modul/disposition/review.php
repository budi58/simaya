<?php
    if($_SESSION['uac'] == 'KBG'){
        include ('modul/disposition/review_kabag.php');
    }elseif($_SESSION['uac'] == 'KBGR'){
        include ('modul/disposition/review_kabagrapat.php');
    }elseif($_SESSION['uac'] == 'KPH'){
        include ('modul/disposition/review_kabaghumas.php');
    }elseif($_SESSION['uac'] == 'KOMA' OR 'KOMB' OR 'KOMC' OR 'KOMD' OR 'SWN'){
        include ('modul/disposition/review_komisi.php');
    }else{
        echo "Koe Sopo?";
    }
?>
               