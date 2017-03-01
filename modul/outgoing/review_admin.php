            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Proses Surat Keluar</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li>
                            <a href="?p=outgoing.read">Surat Keluar</a>
                        </li>
                        <li class="active">
                            <strong>Proses Surat Keluar</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php
                $getId  = $_GET['q']; 
                $sql    = ("SELECT tb_suratkeluar.*, tb_user.*, tb_sifat.*, tb_jenis.* FROM `tb_suratkeluar` 
                            INNER JOIN `tb_sifat` ON (`tb_suratkeluar`.`id_sifat` = `tb_sifat`.`id_sifat`)
                            INNER JOIN `tb_jenis` ON (`tb_suratkeluar`.`id_jenis` = `tb_jenis`.`id_jenis`)
                            INNER JOIN `tb_user` ON (`tb_suratkeluar`.`id_us` = `tb_user`.`id_us`)
                            WHERE `tb_suratkeluar`.`id_sk` = '$getId'"); 
                $res    = $conn->query($sql);
                $row    = $res->fetch_assoc();
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Proses Surat Keluar</h5>
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
                        <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Silahkan lakukan pemeriksaan, kemudian lanjutkan dengan memberi nomor surat sesuai dengan pola klasifikasi surat.
                            </div>
                            <form action="?p=outgoing.action" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Urut</label>
                                    <div class="col-sm-6"><input type="text" name="q" class="form-control" value="<?php echo $getId ?>" readonly >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Surat</label>
                                    <div class="col-sm-6"><input type="text" name="nosk" class="form-control" value="<?php echo $row['nosk']; ?>" >
                                    </div><i>* diisi oleh Tata Usaha</i>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="datepicker">
                                    <label class="col-sm-2 control-label">Tanggal Surat</label>
                                    <div class="col-sm-6">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tglsurat" class="form-control" value="<?php echo date_format(date_create($row['tglsurat']), 'd/m/Y'); ?>" autocomplete="off"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Berkas Surat</label>
                                    <div class="col-sm-6"><a href="files/outgoing/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a> <input type="file" name="file">
                                    </div><i>* File max 1MB</i>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tujuan</label>
                                    <div class="col-sm-6"><input type="text" name="pengirim" class="form-control" value="<?php echo $row['pengirim']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Perihal Surat</label>
                                    <div class="col-sm-6"><textarea type="text" name="perihal" class="form-control"><?php echo $row['perihal']; ?></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Atas Nama/Bagian</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_us">
                                        <option value="<?php echo $row['id_us']; ?>"><?php echo $row['bgn']; ?></option>
                                    
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sifat Surat</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_sifat">
                                        <option value="<?php echo $row['id_sifat']?>"> <?php echo $row['sifat'] ?></option>  
                                    <?php
                                        $sql = "SELECT * FROM tb_sifat"; 
                                        $res = $conn->query($sql);
                                        if($res->num_rows > 0) {
                                            while ($sifat = $res->fetch_assoc()) {
                                                if ($sifat['id_sifat'] != $row['id_sifat']) {
                                                    echo "<option value='".$sifat['id_sifat']."'>".$sifat['sifat']."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Surat</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_jenis">
                                        <option value="<?php echo $row['id_jenis']?>"> <?php echo $row['jenis'] ?></option>  
                                    <?php
                                        $sql = "SELECT * FROM tb_jenis"; 
                                        $res = $conn->query($sql);
                                        if($res->num_rows > 0) {
                                            while ($jenis = $res->fetch_assoc()) {
                                                if ($jenis['id_jenis'] != $row['id_jenis']) {
                                                    echo "<option value='".$jenis['id_jenis']."'>".$jenis['jenis']."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Isi Surat</label>
                                    <div class="col-sm-10"><div class="summernote" name="">
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a class="btn btn-white" href="?p=outgoing.read">Cancel</a>
                                        <button class="btn btn-primary" type="submit" name="acc">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
