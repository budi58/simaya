            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Disposisi Masuk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Disposisi Masuk</strong>
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
                        <h5>Disposisi Masuk</h5>
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Surat Dari</th>
                        <th>Tanggal Surat</th>
                        <th>Nomer Surat</th>
                        <th>Tanggal Diterima</th>
                        <th>No.Agenda | Dispo ke</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT tb_suratmasuk.id_sm, tb_suratmasuk.pengirim, tb_suratmasuk.tglsurat, tb_suratmasuk.nosurat, tb_suratmasuk.tglaccept, tb_suratmasuk.id_ag, tb_dispo.dispo, tb_dispo.ket
                                FROM tb_suratmasuk
                                INNER JOIN tb_dispo ON (tb_suratmasuk.id_sm=tb_dispo.id_dispo)
                                WHERE tb_dispo.dispo = 'KBG' ORDER BY tb_suratmasuk.id_sm DESC";

                        $res = $conn->query($sql);
                        $no = 0;
                        foreach ($res as $row) {
                        
                        $ket = $row['ket'];

                            if ($ket == "0"){
                                $ket = '<span class="label label-warning">Belum ditindaklanjuti</span>';
                            }else{
                                $ket = '<span class="label label-primary">Sudah ditindaklanjuti</span>';
                            }
                        $no++;
                    ?>     
                    <tr class="odd gradeX">
                        <td><?php echo $row['pengirim']; ?></td>
                        <td><?php echo DateIndo($row['tglsurat']);?></td>
                        <td><?php echo $row['nosurat'];?></td>
                        <td><?php echo DateIndo($row['tglaccept']);?></td>
                        <td><?php echo $row['id_sm']; ?><a href="?p=disposition.review&q=<?php echo $row['id_sm'];?>"> <?php echo $ket."</a> ".$_SESSION['bgn']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>