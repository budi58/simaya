
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"><i class="fa fa-envelope-o"></i></span>
                                <h5>Surat Masuk Ketua</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $JmlSMK; ?></h1>
                                <div class="stat-percent font-bold text-success"><?php echo $JmlSMK; ?> <i class="fa fa-envelope-o"></i></div>
                                <small>Total Surat Masuk Ketua</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"><i class="fa fa-envelope-o"></i></span>
                                <h5>Surat Masuk Sekretaris</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $JmlSMS; ?></h1>
                                <div class="stat-percent font-bold text-success"><?php echo $JmlSMS; ?> <i class="fa fa-envelope-o"></i></div>
                                <small>Total Surat Masuk Sekretaris</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"><i class="fa fa-comments-o"></i></span>
                                <h5>Disposisi</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $JmlDispo; ?></h1>
                                <div class="stat-percent font-bold text-info"><?php echo $JmlDispo; ?> <i class="fa fa-comments-o"></i></div>
                                <small>Total Disposisi</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"><i class="fa fa-envelope"></i></span>
                                <h5>Surat Keluar</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $JmlSK; ?></h1>
                                <div class="stat-percent font-bold text-navy"><?php echo $JmlSK; ?> <i class="fa fa-envelope"></i></div>
                                <small>Total Surat Keluar</small>
                            </div>
                        </div>
                    </div>    
                </div>


            <div class="mail-box-header">    
                <h2>
                    Recent Surat Masuk
                </h2>
            </div>
            <div class="mail-box">
                <table class="table table-hover table-mail">
                <tbody>
                <?php 
                    $sql = "SELECT tb_suratmasuk.id_sm, tb_suratmasuk.tglaccept, tb_suratmasuk.perihal, tb_agenda.agenda, tb_suratmasuk.pengirim, tb_suratmasuk.uac, tb_suratmasuk.status FROM tb_suratmasuk
                    INNER JOIN tb_agenda ON (tb_suratmasuk.id_ag = tb_agenda.id_ag)
                    ORDER BY id_sm DESC LIMIT 5";

                    $res = $conn->query($sql);
                    foreach ($res as $row) {

                    $uac = $row['uac'];
                        
                        if ($uac == "ADM"){
                            $uac = 'Ditolak';
                        }elseif($uac == "KSBG"){
                            $uac = 'Terkirim ke Kasubag TU';
                        }elseif($uac == 'KBG'){
                            $uac = 'Terkirim ke Kabag';
                        }elseif($uac == 'SWN'){
                            $uac = 'Terkirim ke Sekwan';
                        }elseif ($uac == 'DWN'){
                            $uac = 'Terkirim ke Ketua';
                        }else{
                            echo 'Oops!';
                        }

                    $status = $row['status'];
                        if ($status == "0"){
                            $status = '<span class="label label-default">Belum dibaca</span>';
                        }else{
                            $status = '<span class="label label-primary">Sudah dibaca</span>';
                        }
                ?>

                <tr class="read">
                    
                    <td class="mail-subject"><a href="?p=incoming.review&q=<?php echo $row['id_sm']; ?>"><?php echo $uac; ?></a></td>
                    <td class="mail-subject"><a href="?p=incoming.review&q=<?php echo $row['id_sm']; ?>"><?php echo $status." ".$row['agenda']." ".$row['pengirim']." ".$row['perihal']; ?></a></td>
                    <td class="text-right mail-date"><?php echo DateIndo2($row['tglaccept']) ; ?></td>

                </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
            </div>

            
            <div class="mail-box-header">    
                <h2>
                    Recent Surat Keluar
                </h2>
            </div>
            <div class="mail-box">
                <table class="table table-hover table-mail">
                <tbody>
                <?php 
                    $sql = "SELECT tb_suratkeluar.id_sk, tb_suratkeluar.tglsurat, tb_suratkeluar.pengirim, tb_suratkeluar.perihal, tb_user.bgn, tb_suratkeluar.uac, tb_suratkeluar.status 
                            FROM tb_suratkeluar 
                            INNER JOIN tb_user ON (`tb_suratkeluar`.`id_us`=`tb_user`.`id_us`) 
                            WHERE tb_suratkeluar.uac = 'ADM'
                            ORDER BY tb_suratkeluar.id_sk DESC LIMIT 5";

                    $res = $conn->query($sql);
                        
                        foreach ($res as $row) {

                        $status = $row['status'];
                        if ($status == "0"){
                            $status = '<span class="label label-default">Belum dibaca</span>';
                        }else{
                            $status = '<span class="label label-primary">Sudah dibaca</span>';
                        }
                ?>

                <tr class="read">
                    <td class="mail-subject"><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>">Dari <?php echo $row['bgn']; ?></a></td>
                    <td class="mail-subject"><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>"><?php echo $status." ".$row['pengirim']." ".$row['perihal']; ?></a></td>
                    <td class="text-right mail-date"><?php echo DateIndo2($row['tglsurat']) ; ?></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
                </table>
            </div>
        </div>
        