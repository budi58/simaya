<?php

	$getId	 = $conn->real_escape_string($_REQUEST['q']);

		$delete = "DELETE FROM tb_pengirim WHERE id_pengirim = '".$getId."' ";

		if ($conn->query($delete)) {
			echo "<meta http-equiv='refresh' content='0; url=?p=sender.view'>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$conn->close();

?>