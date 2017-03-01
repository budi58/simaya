<?php
	$getId	 = $_REQUEST['q'];

 		$cari   = "SELECT * FROM tb_suratkeluar WHERE id_sk = '".$getId."' "; 
		$res    = $conn->query($cari);
		$row    = $res->fetch_array();

		$upload_dir = "files/outgoing/";
		unlink($upload_dir.$row['file']);

		$delete = "DELETE FROM tb_suratkeluar WHERE id_sk = '".$getId."' ";

		if ($conn->query($delete)) {
			echo "<meta http-equiv='refresh' content='0; url=?p=outgoing.read'>";
		}else{
			echo '<div class="wrapper wrapper-content animated fadeIn
				    <div class="row">
				        <div class="alert alert-danger">' . $sqlSm . "<br>" . $conn->error;
            echo '</div>
            	</div>';
		}
?>