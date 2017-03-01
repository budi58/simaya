            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Ubah Password</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Ubah Password</strong>
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
                            <h5>Pengaturan Password</h5>
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
                            if (isset($_POST['ganti'])) {
                            include_once '../core.php';

                            $passOld    = trim($_POST['old']);
                            $passNew    = trim($_POST['new']);
                            $passRepeat = trim($_POST['repeat']);

                            $userId     = $_SESSION['id_us'];
                            $userPass   = sha1($passOld);

                            $sql = "SELECT * FROM tb_user WHERE id_us = '{$userId}' AND upsw = '{$userPass}' ";
                            $res = $conn->query($sql);

                            if (!$res->num_rows >= 1) {
                                echo'<div class="alert alert-danger alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Pasword lama salah! 
                                    </div>';

                            }else if ($passNew !== $passRepeat) {
                                    echo'<div class="alert alert-danger alert-dismissable"> 
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                             Pasword baru dan konfirmasi tidak cocok..
                                    </div>';

                            }else{
                                $newPass = sha1($passRepeat);

                                $update = "UPDATE tb_user SET upsw = '{$newPass}' WHERE id_us = '{$userId}'";

                                if ($conn->query($update) === TRUE) {
                                    echo '<div class="alert alert-success alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                Password berhasil diubah, silahkan login kembali.. 
                                                    <a class="alert-link" href="logout.php">Ok!</a>
                                        </div>';          
                                    }
                                }
                            }
                        ?>

                        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password Lama</label>
                                <div class="col-sm-6"><input type="password" name="old" class="form-control" maxlength="32" required=""> 
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password Baru</label>
                                <div class="col-sm-6"><input type="password" name="new" class="form-control" maxlength="32" required=""> 
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ulangi Password Baru</label>
                                <div class="col-sm-6"><input type="password" name="repeat" class="form-control" maxlength="32" required=""> 
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" name="ganti">Save</button>
                                <button class="btn btn-white" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                