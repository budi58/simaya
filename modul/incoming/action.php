<?php
if (isset($_POST['send'])) {
	//$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
	$allowed_ext	= array('odt', 'doc', 'docx', 'pdf', 'jpg', 'png');

	$file_name		= $_FILES['file']['name'];
	$file_ext		= strtolower(end(explode('.', $file_name)));
	$file_size		= $_FILES['file']['size'];
	$file_tmp		= $_FILES['file']['tmp_name'];

    $tgl         	= explode('/',$_POST['tglaccept']);
	$v_tglaccept 	= $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

	$v_nosurat		= $_POST['nosurat'];

    $tgl        	= explode('/',$_POST['tglsurat']);
	$v_tglsurat 	= $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

	$v_perihal	 	= $_POST['perihal'];
	$v_pengirim	 	= $_POST['pengirim'];
	$v_lamp			= $_POST['lamp'];
	$v_agenda	 	= $_POST['id_ag'];
	$v_sifat	 	= $_POST['id_sifat'];
	$v_status	 	= $_POST['status'];

	$upload_dir = "files/incoming/";
	$file 		= basename ($file_name);
	$v_file 	= str_replace(' ','_',$file);

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

		    $valid = "SELECT * FROM tb_suratmasuk WHERE file = '".$v_file."' ";
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

					$sqlSm = "INSERT INTO tb_suratmasuk (id_sm, tglaccept, nosurat, tglsurat, perihal, pengirim, file, lamp, id_ag, id_sifat, uac, status)
							VALUES (NULL, '".$v_tglaccept."', '".$v_nosurat."', '".$v_tglsurat."', 
										'".$v_perihal."', '".$v_pengirim."', '".$v_file."', 
										'".$v_lamp."', '".$v_agenda."', '".$v_sifat."', 'KSBG', '0') ";

					if ($conn->query($sqlSm) === TRUE) {

						echo '<div class="wrapper wrapper-content animated fadeIn">
								<div class="row">
	            					<div class="alert alert-success"> Surat masuk berhasil dikirim. Proses pemeriksaan telah dimulai untuk dilaksanakan. 
	                            		<a class="alert-link" href="?p=incoming.new">Kembali</a>..
	                            	</div>';
				    	
				    }else{
				        echo '<div class="wrapper wrapper-content animated fadeIn
				        		<div class="row">
				        		<div class="alert alert-danger">' . $sqlSm . "<br>" . $conn->error;
            			echo '</div>';
			    	}
					
					$getId    = "SELECT max(id_sm) AS data FROM tb_suratmasuk";
				    $res	  = $conn->query($getId);
				    $row 	  = $res->fetch_assoc();
				    $v_id_sm  = $row['data'];	

					$sqlDispo = "INSERT INTO tb_dispo (id_dispo, id_sm) VALUES (NULL, '".$v_id_sm."') ";

			    	if ($conn->query($sqlDispo) === TRUE) {

				    	echo '<div class="alert alert-success"> Disposisi berhasil dibuat..</div>
				    			</div> 
				    		</div>';
				    }else{
				        echo '<div class="alert alert-danger">' . $sqlDispo . "<br>" . $conn->error;
				        echo '</div></div></div>';
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

    $tgl         	= explode('/',$_POST['tglaccept']);
	$v_tglaccept 	= $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

	$v_nosurat		= $_POST['nosurat'];

    $tgl        	= explode('/',$_POST['tglsurat']);
	$v_tglsurat 	= $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

	$v_perihal	 	= $_POST['perihal'];
	$v_pengirim	 	= $_POST['pengirim'];
	$v_lamp			= $_POST['lamp'];
	$v_agenda	 	= $_POST['id_ag'];
	$v_sifat	 	= $_POST['id_sifat'];
	$v_status	 	= $_POST['status'];

	$upload_dir 	= "files/incoming/";
	$file 			= basename ($file_name);
	$v_file 		= str_replace(' ','_',$file);

	$getId	= $_REQUEST['q'];
	$cari   = "SELECT * FROM tb_suratmasuk WHERE id_sm = '".$getId."' "; 
	$res    = $conn->query($cari);
	$row    = $res->fetch_array();

	//if($_POST['id_sm']==$row['id_sm']){
  	//Apabila file surat tidak diubah
  	if (empty($file_tmp)){

	$sqlSm = "UPDATE tb_suratmasuk 
					SET tglaccept = '".$v_tglaccept."',
						nosurat   = '".$v_nosurat."',
						tglsurat  = '".$v_tglsurat."',
						perihal   = '".$v_perihal."',
						pengirim  =	'".$v_pengirim."',
						lamp 	  = '".$v_lamp."',
						id_ag     =	'".$v_agenda."',
						id_sifat  = '".$v_sifat."',
						uac 	  = 'KSBG',
						status 	  = '0'
					WHERE id_sm   = '".$getId."' ";

		if ($conn->query($sqlSm) === TRUE) {

			echo '<div class="wrapper wrapper-content animated fadeIn">
					<div class="row">
	            		<div class="alert alert-success"> Surat masuk berhasil diubah. Proses pemeriksaan telah dimulai untuk dilaksanakan. 
	                        <a class="alert-link" href="?p=incoming.read">Kembali</a>..
	                    </div>';
				    	
		}else{
			echo '<div class="wrapper wrapper-content animated fadeIn
					<div class="row">
				        <div class="alert alert-danger">' . $sqlSm . "<br>" . $conn->error;
            echo '</div>';
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

		    $valid = "SELECT * FROM tb_suratmasuk WHERE file = '".$v_file."' ";
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

					$sqlSm = "UPDATE tb_suratmasuk 
								SET tglaccept = '".$v_tglaccept."',
									nosurat   = '".$v_nosurat."',
									tglsurat  = '".$v_tglsurat."',
									perihal   = '".$v_perihal."',
									pengirim  =	'".$v_pengirim."',
									file 	  =	'".$v_file."',
									lamp 	  = '".$v_lamp."',
									id_ag 	  =	'".$v_agenda."',
									id_sifat  = '".$v_sifat."',
									uac 	  = 'KSBG',
									status 	  = '0'
								WHERE id_sm   = '".$getId."' ";

					if ($conn->query($sqlSm) === TRUE) {

						echo '<div class="wrapper wrapper-content animated fadeIn">
								<div class="row">
	            					<div class="alert alert-success"> Surat masuk berhasil diubah. Proses pemeriksaan telah dimulai untuk dilaksanakan. 
	                            		<a class="alert-link" href="?p=incoming.raed">Kembali..</a>.
	                            	</div>';
				    	
				    }else{
				        echo '<div class="wrapper wrapper-content animated fadeIn
				        		<div class="row">
				        		<div class="alert alert-danger">' . $sqlSm . "<br>" . $conn->error;
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
	}
	$conn->close();	
}


if (isset($_POST['confirm'])){

	$getId	 	= $conn->real_escape_string($_POST['q']);
	$v_uac		= $conn->real_escape_string($_POST['uac']);

	$sql = "UPDATE tb_suratmasuk SET uac = '".$v_uac."'
							 WHERE id_sm = '".$getId."' ";	

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<div class="wrapper wrapper-content animated fadeIn">
            					<div class="row">
            					<div class="alert alert-success"> Surat Masuk Berhasil Dikonfirmasi. 
                            		<a class="alert-link" href="?p=home">Kembali</a>.
                            	</div>
                            </div>';
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}						
	$conn->close();
}


if (isset($_POST['disposisi'])){

	$getId	 		= $conn->real_escape_string($_POST['q']);
	$v_dispo		= $conn->real_escape_string($_POST['dispo']);
	$v_isidispo		= $conn->real_escape_string($_POST['isidispo']);
	$v_status		= $conn->real_escape_string($_POST['status']);

	$sql = "UPDATE tb_suratmasuk SET status = '1' WHERE id_sm = '".$getId."' ";	

		if ($conn->query($sql) === TRUE) {
			//echo "<meta http-equiv='refresh' content='0; url=?p=division.view'>";
			echo '<div class="wrapper wrapper-content animated fadeIn">
            		<div class="row">
            			<div class="alert alert-success"> Surat sudah ditindaklanjuti. 
                            <a class="alert-link" href="?p=home">Kembali</a>.
                        </div>';
		}else{
			echo '<div class="wrapper wrapper-content animated fadeIn
					<div class="row">
				        <div class="alert alert-danger">' . $sqlSm . "<br>" . $conn->error;
            echo '</div>';
		}

		$sqlDispo = "UPDATE tb_dispo SET dispo = '".$v_dispo."',
									  isidispo = '".$v_isidispo."'
				 				  WHERE id_dispo  = '".$getId."' ";

			if ($conn->query($sqlDispo) === TRUE) {

				echo '<div class="alert alert-success"> Disposisi sudah ditindaklanjuti.</div>
				    	</div> 
				    </div>';
			}else{
				echo '<div class="alert alert-danger">' . $sqlDispo . "<br>" . $conn->error;
				echo '</div>
					</div>
				</div>';
		}											
	$conn->close();
}

?>
