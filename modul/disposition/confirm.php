<?php

if (isset($_POST['tindakan'])){

	$getId	 		= $conn->real_escape_string($_POST['q']);
	$v_tembusan		= $conn->real_escape_string($_POST['tembusan']);
	$v_isi_tindakan	= $conn->real_escape_string($_POST['isi_tindakan']);
	$v_ket 			= $conn->real_escape_string($_POST['ket']);

	$sqlDispo = "UPDATE tb_dispo SET tembusan = '".$v_tembusan."',
								 isi_tindakan = '".$v_isi_tindakan."',
									  	  ket = '1' 		
				 			  WHERE id_dispo  = '".$getId."' ";

		if ($conn->query($sqlDispo) === TRUE) {

			echo '<div class="wrapper wrapper-content animated fadeIn">
					<div class="row">
					<div class="alert alert-success"> Disposisi sudah ditindaklanjuti.</div>
				</div></div>';
		}else{
			echo '<div class="alert alert-danger">' . $sqlDispo . "<br>" . $conn->error;
			echo '</div>';
		}											
	$conn->close();
}

?>
