
            <?php include 'box_content.php'; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mail-box-header">    
                            <h2>
                                Disposisi Masuk
                            </h2>
                        </div>
                        <div class="mail-box">
                            <table class="table table-hover table-mail">
                            <tbody>
                            <?php 
                                $sql = "SELECT tb_dispo.id_dispo, tb_suratmasuk.tglaccept, tb_agenda.agenda, tb_dispo.dispo, tb_dispo.isidispo, tb_dispo.ket
                                        FROM tb_suratmasuk
                                    INNER JOIN `tb_dispo` ON (`tb_suratmasuk`.`id_sm` = `tb_dispo`.`id_dispo`)
                                    INNER JOIN `tb_agenda` ON (`tb_suratmasuk`.`id_ag` = `tb_agenda`.`id_ag`)
                                    WHERE tb_dispo.dispo = 'KOMC'
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

                            <tr class="read">
                                <td class="mail-subject"><a href="?p=disposition.review&q=<?php echo $row['id_dispo']; ?>"><?php echo $row['agenda']." ".$ket."</a> ".$row['isidispo']; ?></td>
                                <td class="mail-subject"><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>"><?php echo $status." ".$row['pengirim']." ".$row['perihal']; ?></a></td>
                                <td class="text-right mail-date"><?php echo DateIndo2($row['tglaccept']) ; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                            </table>

                            </div>
                        </div>                                     