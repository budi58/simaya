<?php
//include '../core.php';
if (isset($_POST['save'])) {

	$v_id	 	= $conn->real_escape_string($_POST['id_bagian']);
	$v_bagian	= $conn->real_escape_string($_POST['bagian']);
	$v_uac		= $conn->real_escape_string($_POST['uac']);

	$sql = "INSERT INTO tb_bagian (id_bagian, bagian, uac) 
				VALUES (NULL, '".$v_bagian."', '".$v_uac."') ";					

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<script> window.location="?p=division.view"; </script>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();	
}

if (isset($_POST['update'])){

	$getId	 	= $conn->real_escape_string($_POST['q']);
	$v_bagian	= $conn->real_escape_string($_POST['bagian']);
	$v_uac		= $conn->real_escape_string($_POST['uac']);

	$sql = "UPDATE tb_bagian SET bagian = '".$v_bagian."', 
									uac = '".$v_uac."' 
						WHERE id_bagian = '".$getId."' ";					

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<script> window.location="?p=division.view"; </script>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();
}

?>


