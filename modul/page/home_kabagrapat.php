
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right"><i class="fa fa-envelope-o"></i></span>
                                <h5>Surat Masuk Ketua</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo "$JmlSMK"; ?></h1>
                                <div class="stat-percent font-bold text-success"><?php echo "$JmlSMK"; ?> <i class="fa fa-envelope-o"></i></div>
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
                                <h1 class="no-margins"><?php echo "$JmlSMS"; ?></h1>
                                <div class="stat-percent font-bold text-success"><?php echo "$JmlSMS"; ?> <i class="fa fa-envelope-o"></i></div>
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
                                <h1 class="no-margins"><?php echo "$JmlDispo"; ?></h1>
                                <div class="stat-percent font-bold text-info"><?php echo "$JmlDispo"; ?> <i class="fa fa-comments-o"></i></div>
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
                                <h1 class="no-margins"><?php echo "$JmlSK"; ?></h1>
                                <div class="stat-percent font-bold text-navy"><?php echo "$JmlSK"; ?> <i class="fa fa-envelope"></i></div>
                                <small>Total Surat Keluar</small>
                            </div>
                        </div>
                    </div>
                </div>
                    

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mail-box-header">    
                            <h2>
                                Recent Surat Keluar
                            </h2>
                        </div>
                        <div class="mail-box">
                            <table class="table table-hover table-mail">
                            <tbody>
                            <?php 
                                $sql = "SELECT id_sk, nosk, tglsurat, pengirim, perihal, id_us, uac, status 
                                            FROM tb_suratkeluar WHERE id_us = '6' 
                                        ORDER BY id_sk DESC LIMIT 5";
                                $res = $conn->query($sql);
                                    
                                    foreach ($res as $row) {

                                    $uac = $row['uac'];

                                    if($uac == 'ADM'){
                                        $uac = 'Terkirim ke Staf TU';
                                    }elseif($uac == 'SWN'){
                                        $uac = 'Terkirim ke Sekwan';
                                    }elseif($uac == 'KBGR'){
                                        $uac = 'Ditolak Sekwan';
                                    }else{
                                        echo 'Oops';
                                    }

                                    $status = $row['status'];
                                    if ($status == "0"){
                                        $status = '<span class="label label-default">Belum dibaca</span>';
                                    }else{
                                        $status = '<span class="label label-primary">Sudah dibaca</span>';
                                    }
                            ?>

                            <tr class="read">
                                <td class="mail-subject"><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>"><?php echo $uac; ?></a></td>
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


                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Disposisi Masuk</h5>
                            </div>
                            <?php 
                                $sql = "SELECT tb_dispo.id_dispo, tb_suratmasuk.tglaccept, tb_agenda.agenda, tb_dispo.dispo, tb_dispo.isidispo, tb_dispo.ket
                                        FROM tb_suratmasuk
                                        INNER JOIN `tb_dispo` ON (`tb_suratmasuk`.`id_sm` = `tb_dispo`.`id_dispo`)
                                        INNER JOIN `tb_agenda` ON (`tb_suratmasuk`.`id_ag` = `tb_agenda`.`id_ag`)
                                        WHERE tb_dispo.dispo = 'KBGR'
                                        ORDER BY tb_dispo.id_dispo DESC LIMIT 10";

                                $res = $conn->query($sql);

                                foreach ($res as $row) {

                                    $ket = $row['ket'];
                                    if ($ket == "0"){
                                        $ket = '<span class="label label-default">Belum ditindaklanjuti</span>';
                                    }else{
                                        $ket = '<span class="label label-primary">Sudah ditindaklanjuti</span>';
                                    }
                                
                            ?>
                            <div class="ibox-content no-padding">
                                <ul class="list-group">
                                    <li class="list-group-item">      
                                    <p><a class="text-info" href="?p=disposition.review&q=<?php echo $row['id_dispo']; ?>"><?php echo $row['agenda']." ".$ket."</a> ".$row['isidispo']; ?> </p>
                                    <small class="block text-muted"> <?php echo DateIndo2($row['tglaccept']) ; ?></small>
                                    </li>
                                </ul>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>                                           