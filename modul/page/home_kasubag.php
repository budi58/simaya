
            <?php include 'box_content.php'; ?>
    
    
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
                        WHERE uac = 'KSBG' OR uac = 'KBG' OR uac = 'SWN' OR uac = 'DWN' 
                        ORDER BY id_sm DESC LIMIT 5";

                        $res = $conn->query($sql);
                            
                            //$no = 1;
                            foreach ($res as $row) {

                            $uac = $row['uac'];

                            if ($uac == "KSBG"){
                                $uac = 'Dari Staf TU';
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
                        <td class="mail-subject"><a href="?p=incoming.review&q=<?php echo $row['id_sm']; ?>"><?php echo $status." ".$row['pengirim']." ".$row['perihal']; ?></a></td>
                        <td class="text-right mail-date"><?php echo DateIndo2($row['tglaccept']) ; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        