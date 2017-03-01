<?php

	$getId	 = $conn->real_escape_string($_REQUEST['q']);

		$delete = "DELETE FROM tb_bagian WHERE id_bagian = '".$getId."' ";

		if ($conn->query($delete)) {
			echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$conn->close();

?>