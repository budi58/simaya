            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Proses Surat Masuk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li>
                            <a href="?p=incoming.read">Surat Masuk</a>
                        </li>
                        <li class="active">
                            <strong>Proses Surat Masuk</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php
                $getId  = $_GET['q']; 
                $sql    = ("SELECT * FROM `tb_suratmasuk` 
                            INNER JOIN `tb_sifat` ON (`tb_suratmasuk`.`id_sifat` = `tb_sifat`.`id_sifat`)
                            INNER JOIN `tb_agenda` ON (`tb_suratmasuk`.`id_ag` = `tb_agenda`.`id_ag`)
                            WHERE `tb_suratmasuk`.`id_sm` = '$getId'");
                $res    = $conn->query($sql);
                $row    = $res->fetch_assoc();
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Proses Surat Masuk</h5>
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
                                Silahkan lakukan pemeriksaan, kemudian lanjutkan dengan menyetujui, atau menolak surat.
                            </div>
                            <form action="?p=incoming.action" method="post" class="form-horizontal" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nomor Agenda</label>
                                    <div class="col-sm-6"><input type="text" name="q" class="form-control" value="<?php echo $getId; ?>" readonly >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="datepicker">
                                    <label class="col-sm-3 control-label">Tanggal Terima</label>
                                    <div class="col-sm-6">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tglaccept" class="form-control" value="<?php echo date_format(date_create($row['tglaccept']), 'd/m/Y'); ?>" autocomplete="off" readonly/>
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nomor Surat</label>
                                    <div class="col-sm-6"><input type="text" name="nosurat" class="form-control" value="<?php echo $row['nosurat']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="datepicker">
                                    <label class="col-sm-3 control-label">Tanggal Surat</label>
                                    <div class="col-sm-6">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tglsurat" class="form-control" value="<?php echo date_format(date_create($row['tglsurat']), 'd/m/Y'); ?>" autocomplete="off" readonly/>
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Perihal</label>
                                    <div class="col-sm-6"><textarea type="text" name="perihal" class="form-control" readonly><?php echo $row['perihal']; ?></textarea> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Pengirim</label>
                                    <div class="col-sm-6"><input type="text" name="pengirim" class="form-control" value="<?php echo $row['pengirim']; ?>" readonly> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Berkas Surat</label>
                                    <div class="col-sm-6"><a href="files/incoming/<?php echo $row['file']; ?>" target="_blank"><?php echo $row['file']; ?></a> <input type="file" name="file" readonly>
                                    </div><i>* File max 1MB</i>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Penerima</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="agenda" readonly> 
                                    <option value="<?php echo $row['agenda']?>"> <?php echo $row['agenda'] ?></option>  
                                    <?php
                                        $sql = "SELECT * FROM tb_agenda"; 
                                        $res = $conn->query($sql);
                                        if($res->num_rows > 0) {
                                            while ($agenda = $res->fetch_assoc()) {
                                                if ($agenda['id_ag'] != $row['id_ag']) {
                                                    echo "<option value='".$agenda['id_ag']."'>".$agenda['agenda']."</option>";
                                                }
                                            }
                                        }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sifat Surat</label>
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
                                    <label class="col-sm-3 control-label">Tindakan Pemeriksaan</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="uac" required="">
                                        <option></option>
                                        <option value="SWN">Setujui, lanjutkan ke Sekretaris Dewan</option>
                                        <option value="ADM">Tolak, kembalikan ke pemeriksa sebelumnya</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <a href="?p=incoming.read" class="btn btn-white">Cancel</a>
                                        <button class="btn btn-primary" type="submit" name="confirm">Send</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                