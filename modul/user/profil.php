            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profile User</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Profile User</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php
                $getId  = $_SESSION['uac'];
                $sql    = "SELECT nip, nama, bgn, uname, uac FROM tb_user WHERE uac='".$getId."'";
                $res    = $conn->query($sql);
                $row    = $res->fetch_assoc();
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profil User</h5>
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
                            <form action="?p=user.action" method="post" class="form-horizontal" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-6"><input type="text" name="uname" class="form-control" value="<?php echo $row['uname']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NIP</label>
                                    <div class="col-sm-6"><input type="text" name="nip" class="form-control" value="<?php echo $row['nip']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-6"><input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jabatan</label>
                                    <div class="col-sm-6"><input type="text" name="bgn" class="form-control" value="<?php echo $row['bgn']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-2">
                                        <button class="btn btn-white" type="">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="update">Save</button>
                                        <a href="?p=user.password"> Ganti Password? </a>  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                