<?php
if (isset($_POST['send'])) {
	//$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
	$allowed_ext	= array('odt', 'doc', 'docx', 'pdf', 'jpg', 'png');

	$file_name		= $_FILES['file']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
	$file_size		= $_FILES['file']['size'];
	$file_tmp		= $_FILES['file']['tmp_name'];

	//$v_nosurat	 	= $_POST['nosk'];

    $tgl         	= explode('/',$_POST['tglsurat']);
	$v_tglsurat  	= $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

	$v_pengirim	 	= $_POST['pengirim'];
	$v_perihal	 	= $_POST['perihal'];
	$v_user 	 	= $_POST['id_us'];
	$v_sifat	 	= $_POST['id_sifat'];
	$v_jenis	 	= $_POST['id_jenis'];
	$v_isisurat	 	= $_POST['isisurat'];
	$v_uac 		 	= $_POST['uac'];
	$v_status	 	= $_POST['status'];

	$upload_dir  	= "files/outgoing/";
	$file 		 	= basename ($file_name);
	$v_file 	 	= str_replace(' ','_',$file);

	if(in_array($file_ext, $allowed_ext) === TRUE) {
		if($file_size < 1044070) {

			$send = "SELECT * FROM tb_pengirim WHERE pengirim = '".$v_pengirim."' ";
			$res  = $conn->query($send);
			//$cek  = $res->num_rows(); 

				if ($res->num_rows < 1) {
					$new = "INSERT INTO tb_pengirim (id_pengirim, pengirim) 
									VALUES (NULL, '".$v_pengirim."')";
					$conn->query($new);
				}


		    $valid = "SELECT * FROM tb_suratkeluar WHERE file = '".$v_file."' ";
		    $result = $conn->query($valid);

			    if ($result->num_rows > 0) {
			        echo '
			        <div class="wrapper wrapper-content animated fadeIn">
            			<div class="row">
			        		<div class="alert alert-danger"> Surat sudah dikirim!</div>
			        	</div>
			        </div>';
			    }else{

			    if (move_uploaded_file($file_tmp,$upload_dir.$v_file)){

					$sqlSk = "INSERT INTO tb_suratkeluar (id_sk, tglsurat, file, pengirim, perihal, id_us, id_sifat, id_jenis, isisurat, uac, status)
							VALUES (NULL, '".$v_tglsurat."', '".$v_file."', '".$v_pengirim."', 
										  '".$v_perihal."', '".$v_user."', '".$v_sifat."', 
										  '".$v_jenis."', '".$v_isisurat."', 'SWN', '0') ";

					if ($conn->query($sqlSk) === TRUE) {

						echo '<div class="wrapper wrapper-content animated fadeIn">
								<div class="row">
	            					<div class="alert alert-success"> Surat keluar berhasil dikirim. Proses pemeriksaan telah dimulai untuk dilaksanakan. 
	                            		<a class="alert-link" href="?p=outgoing.new">Kembali</a>..
	                            	</div>';
				    	
				    }else{
				        echo '<div class="wrapper wrapper-content animated fadeIn
				        		<div class="row">
				        		<div class="alert alert-danger">' . $sqlSk . "<br>" . $conn->error;
            			echo '</div>';
			    	}
				}else{
					echo '<div class="alert alert-danger"> Gagal Upload File Surat!</div>
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
	$conn->close();
}


if (isset($_POST['update'])){

	//$getId	 		= $conn->real_escape_string($_POST['q']);
	$allowed_ext	= array('odt', 'doc', 'docx', 'pdf', 'jpg', 'png');

	$file_name		= $_FILES['file']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
	$file_size		= $_FILES['file']['size'];
	$file_tmp		= $_FILES['file']['tmp_name'];

    //$v_nosurat	 	= $_POST['nosk'];

    $tgl         	= explode('/',$_POST['tglsurat']);
	$v_tglsurat  	= $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

	$v_pengirim	 	= $_POST['pengirim'];
	$v_perihal	 	= $_POST['perihal'];
	$v_user 	 	= $_POST['id_us'];
	$v_sifat	 	= $_POST['id_sifat'];
	$v_jenis	 	= $_POST['id_jenis'];
	$v_isisurat	 	= $_POST['isisurat'];
	$v_uac 		 	= $_POST['uac'];
	$v_status	 	= $_POST['status'];

	$upload_dir  	= "files/outgoing/";
	$file 		 	= basename ($file_name);
	$v_file 	 	= str_replace(' ','_',$file);

	$getId	= $_REQUEST['q'];
	$cari   = "SELECT * FROM tb_suratkeluar WHERE id_sk = '".$getId."' "; 
	$res    = $conn->query($cari);
	$row    = $res->fetch_array();

	//if($_POST['id_sm']==$row['id_sm']){
  	//Apabila file surat tidak diubah
  	if (empty($file_tmp)){

	$sqlSk = "UPDATE tb_suratkeluar 
					SET tglsurat  = '".$v_tglsurat."',
						pengirim  =	'".$v_pengirim."',
						perihal   = '".$v_perihal."',
						id_us     =	'".$v_user."',
						id_sifat  = '".$v_sifat."',
						id_jenis  = '".$v_jenis."',
						isisurat  = '".$v_isisurat."',
						uac 	  = 'SWN',
						status 	  = '0'
					WHERE id_sk   = '".$getId."' ";

		if ($conn->query($sqlSk) === TRUE) {

			echo '<div class="wrapper wrapper-content animated fadeIn">
					<div class="row">
	            		<div class="alert alert-success"> Surat masuk berhasil diubah. Proses pemeriksaan telah dimulai untuk dilaksanakan. 
	                        <a class="alert-link" href="?p=outgoing.new">Kembali</a>..
	                    </div>
	                </div>
	            </div>';	    	
		}else{
			echo '<div class="wrapper wrapper-content animated fadeIn
					<div class="row">
				        <div class="alert alert-danger">' . $sqlSk . "<br>" . $conn->error;
            	echo '</div>
            		</div>
            	</div>';
		}
	}

	//Apabila file surat diubah
  	elseif(!empty($file_tmp)){

	if(in_array($file_ext, $allowed_ext) === TRUE) {
		if($file_size < 1044070) {

			$send = "SELECT * FROM tb_pengirim WHERE pengirim = '".$v_pengirim."' ";
			$res  = $conn->query($send);

				if ($res->num_rows < 1) {
					$new = "INSERT INTO tb_pengirim (id_pengirim, pengirim) 
									VALUES (NULL, '".$v_pengirim."')";
					$conn->query($new);
				}

		    $valid = "SELECT * FROM tb_suratkeluar WHERE file = '".$v_file."' ";
		    $result = $conn->query($valid);

			    if ($result->num_rows > 0) {
			        echo '
			        <div class="wrapper wrapper-content animated fadeIn">
            			<div class="row">
			        		<div class="alert alert-danger"> Surat sudah diubah!</div>
			        	</div>
			        </div>';
			    }else{

			    if (move_uploaded_file($file_tmp,$upload_dir.$v_file)){

					unlink($upload_dir.$row['file']);

					$sqlSk = "UPDATE tb_suratkeluar 
									SET tglsurat  = '".$v_tglsurat."',
										file 	  = '".$v_file."',
										pengirim  =	'".$v_pengirim."',
										perihal   = '".$v_perihal."',
										id_us     =	'".$v_user."',
										id_sifat  = '".$v_sifat."',
										id_jenis  = '".$v_jenis."',
										isisurat  = '".$v_isisurat."',
										uac 	  = 'SWN',
										status 	  = '0'
									WHERE id_sk   = '".$getId."' ";

					if ($conn->query($sqlSk) === TRUE) {

						echo '<div class="wrapper wrapper-content animated fadeIn">
								<div class="row">
				            		<div class="alert alert-success"> Surat masuk berhasil diubah. Proses pemeriksaan telah dimulai untuk dilaksanakan. 
				                        <a class="alert-link" href="?p=outgoing.new">Kembali</a>..
				                    </div>
				                </div>
				            </div>';	    	
					}else{
						echo '<div class="wrapper wrapper-content animated fadeIn
								<div class="row">
							        <div class="alert alert-danger">' . $sqlSk . "<br>" . $conn->error;
			            	echo '</div>
			            		</div>
			            	</div>';
					}
				}else{
					echo '<div class="alert alert-danger"> Gagal Upload File Surat!</div>
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


if (isset($_POST['confirm'])){

	$getId	 	= $conn->real_escape_string($_POST['q']);
	$v_uac		= $conn->real_escape_string($_POST['uac']);

	$sql = "UPDATE tb_suratkeluar SET uac ='".$v_uac."'
							  WHERE id_sk = '".$getId."' ";	

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<div class="wrapper wrapper-content animated fadeIn">
            					<div class="row">
            					<div class="alert alert-success"> Surat keluar berhasil ditindaklanjuti. 
                            		<a class="alert-link" href="?p=home">Kembali</a>.
                            	</div>
                            </div>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();
}


if (isset($_POST['acc'])){

	$getId	 	= $conn->real_escape_string($_POST['q']);
	$v_nosurat	= $conn->real_escape_string($_POST['nosk']);
	$v_status 	= $conn->real_escape_string($_POST['status']);

	$sql = "UPDATE tb_suratkeluar SET nosk ='".$v_nosurat."',
									status = '1'
							   WHERE id_sk = '".$getId."' ";	

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<div class="wrapper wrapper-content animated fadeIn">
            					<div class="row">
            					<div class="alert alert-success"> Surat keluar berhasil ditindaklanjuti. 
                            		<a class="alert-link" href="?p=home">Kembali</a>.
                            	</div>
                            </div>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();
}
?>


