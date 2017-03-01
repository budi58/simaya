            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profil Instansi</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Profil Instansi</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php
                $sql    = "SELECT * FROM tb_kantor";
                $res    = $conn->query($sql);
                $row    = $res->fetch_assoc();
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
            
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profil Instansi</h5>
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
                            <form action="?p=seting.action" method="post" class="form-horizontal" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pemkab</label>
                                    <div class="col-sm-6"><input type="text" name="kab" class="form-control" value="<?php echo $row['kab']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kantor DPRD</label>
                                    <div class="col-sm-6"><input type="text" name="kantor" class="form-control" value="<?php echo $row['kantor']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-6"><input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Pos</label>
                                    <div class="col-sm-6"><input type="text" name="pos" class="form-control" value="<?php echo $row['pos']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-6"><input type="text" name="telp" class="form-control" value="<?php echo $row['telp']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Faksimile</label>
                                    <div class="col-sm-6"><input type="text" name="faks" class="form-control" value="<?php echo $row['faks']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">E-mail</label>
                                    <div class="col-sm-6"><input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Website</label>
                                    <div class="col-sm-6"><input type="text" name="web" class="form-control" value="<?php echo $row['web']; ?>"> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Logo</label>
                                    <div class="col-sm-6"><img src="img/<?php echo $row['logo']; ?>" width="85" height="120" style="margin-bottom: 10px;"><input type="file" name="logo" accept="image/*"><i>* Type gambar jpg/jpeg</i> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="update">Save</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                