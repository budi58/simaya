            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Informasi Surat</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li>
                            <a href="?p=disposition.read">Surat Masuk</a>
                        </li>
                        <li class="active">
                            <strong>Informasi Surat</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Informasi Surat</h5>
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
                    <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Surat dari</th>
                        <th>Tanggal Surat</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Diterima</th>
                        <th>Nomer Agenda</th>   
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $getId  = $_GET['q'];

                        $sql    = "SELECT tb_suratmasuk.id_sm, tb_suratmasuk.tglaccept, tb_suratmasuk.nosurat, tb_suratmasuk.tglsurat, tb_suratmasuk.perihal, tb_suratmasuk.pengirim, tb_suratmasuk.file, tb_agenda.jabatan, tb_user.nama, tb_sifat.sifat, tb_dispo.dispo, tb_dispo.isidispo, tb_dispo.tembusan, tb_dispo.isi_tindakan, tb_bagian.bagian, tb_dispo.ket
                            FROM `tb_suratmasuk` 
                            INNER JOIN `tb_sifat` ON (`tb_suratmasuk`.`id_sifat` = `tb_sifat`.`id_sifat`)
                            INNER JOIN `tb_agenda` ON (`tb_suratmasuk`.`id_ag` = `tb_agenda`.`id_ag`)
                            INNER JOIN `tb_dispo` ON (`tb_suratmasuk`.`id_sm` = `tb_dispo`.`id_dispo`)
                            INNER JOIN `tb_bagian` ON (`tb_dispo`.`dispo` = `tb_bagian`.`uac`)
                            INNER JOIN `tb_user` ON (`tb_suratmasuk`.`uac` = `tb_user`.`uac`)
                                WHERE `tb_suratmasuk`.`id_sm` = '{$getId}'";

                        $res = $conn->query($sql);
                        
                        foreach ($res as $row) {

                            $tembusan = $row['tembusan'];

                            if ($tembusan == "KBGR"){
                                $tembusan = 'Dihadiri sendiri / Kabag Rapat & UU';
                            }elseif($tembusan == "KSPU"){
                                $tembusan = 'Diwakilkan / Kasubag Perundangan & Perpus';
                            }elseif($tembusan == 'KSBR'){
                                $tembusan = 'Diwakilkan / Kasubag Rapat';
                            }elseif($tembusan == 'KSRI'){
                                $tembusan = 'Diwakilkan / Kasubag Risalah';
                            }else{
                                echo '';
                            }

                            $ket = $row['ket'];

                            if ($ket == "0"){
                                $ket = '<span class="label label-warning">Belum ditindaklanjuti</span>';
                            }else{
                                $ket = '<span class="label label-primary">Sudah ditindaklanjuti</span>';
                            }
                        }
                    ?>
                    <tr>
                        <td><?php echo $row['pengirim']; ?></td>
                        <td><?php echo DateIndo($row['tglsurat']); ?></td>
                        <td><?php echo $row['nosurat']; ?></td>
                        <td><?php echo DateIndo($row['tglaccept']); ?></td>
                        <td><?php echo $row['id_sm']; ?></td>
                    </tr>
                    </tbody>
                    </table>

                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Berkas Surat</th>
                        <th>Dispo Dari</th>
                    </tr>
                    </thead>
                    <tbody>     
                    <tr>
                        <td>1. <a href="files/incoming/<?php echo $row['file']; ?>" target="_blank" ><?php echo $row['file']; ?></a></td>
                        <td><?php echo $row['nama']." - ".$row['jabatan']; ?></td>
                    </tr>
                    </tbody>   
                    </table>

                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Dispo kepada</th>
                        <th>Isi disposisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 40%;"><?php echo $_SESSION['bgn']." ".$ket; ?></td>
                        <td><?php echo $row['isidispo']; ?></td>
                    </tr>
                    </tbody>
                    </table>

                    <form action="?p=disposition.confirm" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Dispo tindakan</th>
                        <th>Isi tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 40%;">
                        <input type="hidden" name="q" value="<?php echo $getId ?>" >
                            <select class="select2_demo_3 form-control" name="tembusan" value="<?php echo $row['tembusan']; ?>" required="">
                                <option value="<?php echo $row['tembusan']; ?>"> <?php echo $tembusan; ?></option>
                                <option value="KBGR">Dihadiri Sendiri / Kabag Rapat & UU</option>
                                <option value="KSPU">Diwakilkan / Kasubag Perundangan & Perpus</option>
                                <option value="KSBR">Diwakilkan / Kasubag Rapat</option>
                                <option value="KSRI">Diwakilkan / Kasubag Risalah</option>
                            </select>
                        </td>
                        <td>
                            <textarea type="text" name="isi_tindakan" class="form-control" required="" placeholder="Isi komentar disini"><?php echo $row['isi_tindakan']; ?></textarea>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                        <button class="btn btn-primary" type="submit" name="tindakan">Kirim disposisi</button>
                        <a class="btn btn-primary" title="Lihat Dipsosisi" href="print.php?s=disposition.sekwan&q=<?php echo $row['id_sm']; ?>" target='_blank'>Disposisi</a>
                    </form>        
                    </div>
                </div>
            </div>