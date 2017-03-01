            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Buat Surat Masuk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li>
                            <a href="?p=incoming.read">Surat Masuk</a>
                        </li>
                        <li class="active">
                            <strong>Surat Masuk Manual</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php  
                $sql = "SELECT id_ag, agenda FROM tb_agenda";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $agenda .= "<option value='{$row['id_ag']}'> {$row['agenda']} </option>";
                }

                $sql = "SELECT id_sifat, sifat FROM tb_sifat";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $sifat .= "<option value='{$row['id_sifat']}'> {$row['sifat']} </option>";
                }

                $sql = "SELECT * FROM tb_bagian";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $bagian .= "<option value='{$row['uac']}'> {$row['bagian']} </option>";
                }                                 

                $getId    = "SELECT max(id_sm) AS data FROM tb_suratmasuk";
                $res      = $conn->query($getId);
                $row      = $res->fetch_assoc();
                $v_id_sm  = $row['data']+1;
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Surat Masuk Manual</h5>
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
                            <form action="?p=incoming.action" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nomor Agenda</label>
                                    <div class="col-sm-6"><input type="text" name="id_sm" class="form-control" value="<?php echo $v_id_sm; ?>" readonly >
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="datepicker">
                                    <label class="col-sm-3 control-label">Tanggal Terima</label>
                                    <div class="col-sm-6">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tglaccept" class="form-control" value="<?php echo date('d/m/Y');?>" required="" autocomplete="off">
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nomor Surat</label>
                                    <div class="col-sm-6"><input type="text" name="nosurat" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="datepicker">
                                    <label class="col-sm-3 control-label">Tanggal Surat</label>
                                    <div class="col-sm-6">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tglsurat" class="form-control" required="" autocomplete="off">
                                    </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Perihal Surat</label>
                                    <div class="col-sm-6"><textarea type="text" name="perihal" class="form-control" required=""></textarea> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Pengirim</label>
                                    <div class="col-sm-6">
                                    <input type="text" name="pengirim" class="form-control" required=""> 
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Berkas Surat</label>
                                    <div class="col-sm-6"><input type="file" name="file" required="">
                                    </div><i>* File max 1MB</i>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Penerima</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_ag" required="">
                                        <option></option>
                                        <?php echo($agenda); ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sifat Surat</label>
                                    <div class="col-sm-6">
                                    <select class="select2_demo_3 form-control" name="id_sifat" required="">
                                        <option></option>
                                        <?php echo($sifat); ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
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
                