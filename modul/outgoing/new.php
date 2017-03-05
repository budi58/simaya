            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Buat Surat Keluar</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li>
                            <a href="?p=outgoing.read">Surat Keluar</a>
                        </li>
                        <li class="active">
                            <strong>Surat Keluar Manual</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <?php
            $sql = "SELECT id_sifat, sifat FROM tb_sifat";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                $sifat .= "<option value='{$row['id_sifat']}'> {$row['sifat']} </option>";
            }

            $sql = "SELECT id_jenis, jenis FROM tb_jenis";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                $jenis .= "<option value='{$row['id_jenis']}'> {$row['jenis']} </option>";
            }

            $sql = "SELECT id_us, bgn FROM tb_user";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                $bagian .= "<option value='{$row['id_us']}'> {$row['bgn']} </option>";
            }
                                           

            $getId    = "SELECT max(id_sk) AS data FROM tb_suratkeluar";
            $res      = $conn->query($getId);
            $row      = $res->fetch_assoc();
            $v_id_sk  = $row['data']+1;
        ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Buat Surat Keluar</h5>
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
                                Silahkan masukkan surat kertas yang ingin dimasukkan ke dalam sistem dalam halaman ini.
                            </div>
                            <form action="?p=outgoing.action" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Urut</label>
                                    <div class="col-sm-6"><input type="text" name="id_sk" class="form-control" value="<?php echo $v_id_sk; ?>" readonly >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nomor Surat</label>
                                    <div class="col-sm-6"><input type="text" name="nosk" class="form-control" readonly="">
                                    </div><i>* diisi oleh Tata Usaha</i>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="datepicker">
                                    <label class="col-sm-2 control-label">Tanggal Surat</label>
                                    <div class="col-sm-6">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tglsurat" class="form-control" required="" autocomplete="off">
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Berkas Surat</label>
                                    <div class="col-sm-6"><input type="file" name="file" required="">
                                    </div><i>* File max 1MB</i>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Lampiran</label>
                                    <div class="col-sm-6">
                                    <input type="text" name="lamp" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tujuan</label>
                                    <div class="col-sm-6"><input type="text" name="pengirim" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Perihal Surat</label>
                                    <div class="col-sm-6"><textarea type="text" name="perihal" class="form-control" required=""></textarea> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Atas Nama/Bagian</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_us">
                                        <option value="<?php echo $_SESSION['id_us']; ?>"><?php echo $_SESSION['bgn']; ?></option>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sifat Surat</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_sifat" required="">
                                        <option></option>
                                        <?php echo($sifat); ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jenis Surat</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_jenis" required="">
                                        <option></option>
                                        <?php echo($jenis); ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Isi Surat</label>
                                    <div class="col-sm-10">
                                    <div class="ibox-content no-padding"><textarea class="summernote" name="isisurat">Buat surat disini</textarea>
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Reset</button>
                                        <button class="btn btn-primary" type="submit" name="send">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



                