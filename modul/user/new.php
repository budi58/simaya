            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>New User</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>New User</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>New User</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                        <?php
                        if (isset($_POST['save'])){

                            $v_nip      = $_POST['nip'];
                            $v_nama     = $_POST['nama'];
                            $v_bagian   = $_POST['bagian'];
                            $v_bgn      = $_POST['bgn'];
                            $v_uname    = $_POST['uname'];
                            $v_upsw     = $_POST['upsw'];
                            $v_uac      = $_POST['uac'];

                            $sql = "INSERT INTO tb_user (id_us, nip, nama, bgn, uname, upsw, uac)
                                        VALUES (NULL, '".$v_nip."', '".$v_nama."', '".$v_bgn."',
                                                    '".$v_uname."', '".sha1($v_upsw)."', '".$v_uac."') ";   

                                if ($conn->query($sql) === TRUE) {
                                    echo '<div class="alert alert-success alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            User baru berhasil ditambahkan..
                                                <a class="alert-link" href="logout.php">Ok!</a>
                                        </div>'; 
                                }else{
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }                       
                            $conn->close();
                            }
                        ?>
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-6"><input type="text" name="uname" class="form-control" maxlength="32" required=""> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NIP</label>
                                    <div class="col-sm-6"><input type="text" name="nip" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-6"><input type="text" name="nama" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jabatan</label>
                                    <div class="col-sm-6"><input type="text" name="bgn" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-6"><input type="password" name="upsw" class="form-control" maxlength="32" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">UAC</label>
                                    <div class="col-sm-6"><input type="text" name="uac" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="save">Save</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                