<?php
if (isset($_POST['update'])){

	//$getId	 	= $_POST['uac'];
	$v_nip		= $_POST['nip'];
	$v_nama 	= $_POST['nama'];
	$v_bgn 		= $_POST['bgn'];

	$sql = "UPDATE tb_user 
				SET nip  ='".$v_nip."',
					nama = '".$v_nama."',
					bgn  = '".$v_bgn."' 
				WHERE id_us = '".$_SESSION['id_us']."' ";	

		if ($conn->query($sql) === TRUE) {
			echo "<meta http-equiv='refresh' content='0; url=?p=user.profil'>";
			//echo '<script> window.location="?p=user.profil"; </script>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();
}
?>