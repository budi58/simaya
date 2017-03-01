<?php
	$getId	 = $_REQUEST['q'];

 		$cari   = "SELECT * FROM tb_suratmasuk WHERE id_sm = '".$getId."' "; 
		$res    = $conn->query($cari);
		$row    = $res->fetch_array();

		$upload_dir = "files/incoming/";
		unlink($upload_dir.$row['file']);

		$delete = "DELETE FROM tb_suratmasuk WHERE id_sm = '".$getId."' ";

		if ($conn->query($delete)) {
			echo "<meta http-equiv='refresh' content='0; url=?p=incoming.read'>";
		}else{
			echo '<div class="wrapper wrapper-content animated fadeIn
				    <div class="row">
				        <div class="alert alert-danger">' . $sqlSm . "<br>" . $conn->error;
            echo '</div>
            	</div>';
	}
?>