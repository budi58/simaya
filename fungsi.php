<?php
function DateIndo($date){
	date_default_timezone_set('Asia/Jakarta');
    $BulanIndo = array("Januari", "Pebruari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
    return($result);
}

function DateIndo2($date){
	date_default_timezone_set('Asia/Jakarta');
    $BulanIndo = array("Jan", "Peb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agst", "Sep", "Okt", "Nov", "Des");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
    return($result);
}
?>