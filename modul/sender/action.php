<?php
//include '../core.php';
if (isset($_POST['save'])) {

	$v_id	 	= $conn->real_escape_string($_POST['id_pengirim']);
	$v_pengirim	= $conn->real_escape_string($_POST['pengirim']);

	$sql = "INSERT INTO tb_pengirim (id_pengirim, pengirim) VALUES (NULL, '".$v_pengirim."') ";

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<script> window.location="?p=sender.view"; </script>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();	
}


if (isset($_POST['update'])){

	$getId	 	= $conn->real_escape_string($_POST['q']);
	$v_pengirim	= $conn->real_escape_string($_POST['pengirim']);

	$sql = "UPDATE tb_pengirim SET pengirim ='".$v_pengirim."' WHERE id_pengirim = '".$getId."' ";	

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<script> window.location="?p=sender.view"; </script>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();
}

?>


