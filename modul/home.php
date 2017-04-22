<?php
	if($_SESSION['uac'] == 'ADM') {
		include ('modul/page/home_admin.php');
	}elseif($_SESSION['uac'] == 'KSBG') {
		include ('modul/page/home_kasubag.php');
	}elseif($_SESSION['uac'] == 'KBG') {
		include ('modul/page/home_kabag.php');
	}elseif($_SESSION['uac'] == 'KBGR') {
		include ('modul/page/home_kabagrapat.php');
	}elseif($_SESSION['uac'] == 'KPH') {
		include ('modul/page/home_kabaghumas.php');
	}elseif($_SESSION['uac'] == 'SWN') {
		include ('modul/page/home_sekwan.php');
	}elseif($_SESSION['uac'] == 'KOMA') {
		include ('modul/page/home_komisi_a.php');
	}elseif($_SESSION['uac'] == 'KOMB') {
		include ('modul/page/home_komisi_b.php');
	}elseif($_SESSION['uac'] == 'KOMC') {
		include ('modul/page/home_komisi_c.php');
	}elseif($_SESSION['uac'] == 'KOMD') {
		include ('modul/page/home_komisi_d.php');
	}elseif($_SESSION['uac'] == 'DWN') {
		include ('modul/page/home_dewan.php');
	}else{
		echo "Koe Sopo?";
	}
?>