<?php
	require_once ('core.php');
	$v_uname = $conn->real_escape_string($_POST['uname']);
	$v_upsw	 = $conn->real_escape_string($_POST['upsw']);

	$log = "SELECT *FROM tb_user WHERE uname='".$v_uname."' AND upsw='".sha1($v_upsw)."'";
	$res = $conn->query($log);
	$row = $res->fetch_assoc();

	if ($res->num_rows > 0) {
		foreach ($row as $key => $value) {
			# code...
			$_SESSION[$key] = $value;
			//session_start();
			$_SESSION['id_us'] 	= $row['id_us']; 
			$_SESSION['nip'] 	= $row['nip'];
			$_SESSION['nama']	= $row['nama'];
			$_SESSION['bgn'] 	= $row['bgn'];
			$_SESSION['uname'] 	= $row['uname'];
			$_SESSION['upsw']	= $row['upsw'];  
			$_SESSION['uac'] 	= $row['uac']; 

			header('location:app.php');
		}
	}else{
		header('location:login.php?act=error');
	}
?>