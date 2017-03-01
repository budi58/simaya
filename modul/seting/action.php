<?php

if (isset($_POST['update'])) {

	$allowed_ext	= array('jpg', 'jpeg');

	$logo_name		= $_FILES['logo']['name'];
	$logo_ext		= strtolower(end(explode('.', $logo_name)));
	$logo_size		= $_FILES['logo']['size'];
	$logo_tmp		= $_FILES['logo']['tmp_name'];

	//$v_id	  = $conn->real_escape_string($_POST['id']);
	$v_kab	  = $_POST['kab'];
	$v_kantor = $_POST['kantor'];
	$v_alamat = $_POST['alamat'];
	$v_pos	  = $_POST['pos'];
	$v_telp	  = $_POST['telp'];
	$v_faks	  = $_POST['faks'];
	$v_email  = $_POST['email'];
	$v_web	  = $_POST['web'];

	$upload_dir = "img/";
	$logo 		= basename ($logo_name);
	$v_logo 	= str_replace(' ','_',$logo);

	//$getId	= $_GET['q'];
	$cari   = "SELECT * FROM tb_kantor"; 
	$res    = $conn->query($cari);
	$row    = $res->fetch_array();

	// Apabila logo tidak diubah
	if (empty($logo_tmp)){

	$sql = "UPDATE tb_kantor 
			SET kab 	= '".$v_kab."',
				kantor 	= '".$v_kantor."',
				alamat 	= '".$v_alamat."',
				pos 	= '".$v_pos."',
				telp 	= '".$v_telp."',
				faks 	= '".$v_faks."',
				email 	= '".$v_email."',
				web 	= '".$v_web."' ";

		if ($conn->query($sql) === TRUE) {

			echo '<div class="wrapper wrapper-content animated fadeIn">
					<div class="row">
	            		<div class="alert alert-success"> Berhasil diubah.. 
	                    	<a class="alert-link" href="?p=seting.profile">Kembali</a>..
	                    </div>';
				    	
		}else{
			echo '<div class="wrapper wrapper-content animated fadeIn
				    <div class="row">
				        <div class="alert alert-danger">' . $sql . "<br>" . $conn->error;
            echo '</div>';
		}
	}

	//Apabila logo diubah
  	elseif(!empty($logo_tmp)){

	if(in_array($logo_ext, $allowed_ext) === TRUE) {
		if($logo_size < 1044070) {

			$valid = "SELECT * FROM tb_kantor WHERE logo = '".$v_logo."' ";
		    $result = $conn->query($valid);

			    if ($result->num_rows > 0) {
			        echo '
			        <div class="wrapper wrapper-content animated fadeIn">
            			<div class="row">
			        		<div class="alert alert-danger"> Data sudah diubah!</div>
			        	</div>
			        </div>';
			    }else{

				if (move_uploaded_file($logo_tmp,$upload_dir.$v_logo)){

					unlink($upload_dir.$row['logo']);

					$sql = "UPDATE tb_kantor SET 
									kab 	= '".$v_kab."',
									kantor 	= '".$v_kantor."',
									alamat 	= '".$v_alamat."',
									pos 	= '".$v_pos."',
									telp 	= '".$v_telp."',
									faks 	= '".$v_faks."',
									email 	= '".$v_email."',
									web 	= '".$v_web."',
									logo 	= '".$v_logo."' ";

					if ($conn->query($sql) === TRUE) {

						echo '<div class="wrapper wrapper-content animated fadeIn">
								<div class="row">
		            				<div class="alert alert-success"> Berhasil diubah..
		                            	<a class="alert-link" href="?p=seting.profile">Kembali</a>..
		                            </div>';
					    	
					}else{
					    echo '<div class="wrapper wrapper-content animated fadeIn
					        	<div class="row">
					        		<div class="alert alert-danger">' . $sql . "<br>" . $conn->error;
	            		echo '</div>';
				    }
				}else{
					echo '<div class="alert alert-danger"> Gagal Upload logo</div>
            				</div>
            			</div>
            		</div>';
				}
			}
		}else{
				echo '<div class="wrapper wrapper-content animated fadeIn">
            			<div class="row">
            				<div class="alert alert-danger"> Besar ukuran file surat (file size) maksimal 1 Mb!</div>
            			</div>
            		</div>';	
			}

	}else{
		echo '<div class="wrapper wrapper-content animated fadeIn">
            	<div class="row">
            		<div class="alert alert-danger"> Ekstensi file tidak di izinkan!</div>
            	</div>
            </div>';
		}
	}
	$conn->close();		
}

?>


