            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Surat Keluar</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Surat Keluar</strong>
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
                        <h5>Surat Keluar</h5>
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
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor Surat</th>
                        <th>Tujuan</th>
                        <th>Dari</th>
                        <th>Perihal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT tb_suratkeluar.id_sk, tb_suratkeluar.nosk, tb_suratkeluar.tglsurat, tb_suratkeluar.pengirim, tb_suratkeluar.perihal, tb_user.bgn, tb_suratkeluar.uac, tb_suratkeluar.status, tb_suratkeluar.id_thn
                            FROM tb_suratkeluar 
                            INNER JOIN tb_user ON (`tb_suratkeluar`.`id_us`=`tb_user`.`id_us`) 
                            WHERE tb_suratkeluar.uac = 'ADM' ORDER BY tb_suratkeluar.id_sk DESC";
                            
                        $res = $conn->query($sql);
                        $no = 0;
                        foreach ($res as $row) {

                            $status = $row['status'];
                            if ($status == "0"){
                                $status = '<span class="label label-warning">Belum dibaca</span>';
                            }else{
                                $status = '<span class="label label-primary">Sudah dibaca</span>';
                            }

                            $nosk = $row['nosk'];
                            if ($nosk == ''){
                                $nosk = '<i>empty</i>';
                            }else{
                                $nosk = ' '.$row['nosk'].' ';
                            }

                        $no++;
                    ?>        
                    <tr class="odd gradeX">
                        <td><?php echo $no; ?></td>
                        <td><?php echo DateIndo($row['tglsurat']); ?></td>
                        <td><?php echo $nosk;?></td>
                        <td><?php echo $row['pengirim'];?></td>
                        <td><?php echo $row['bgn'];?></td>
                        <td><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>"><?php echo $status."</a> ".$row['perihal']; ?></td>
                    </tr>
                    <!-- MODAL -->
                    <!-- BEGIN DELETE -->
                    <div class="modal inmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="delete<?php echo $row['id_sk']; ?>" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"> Hapus Data Surat?</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="">Data yang sudah terhapus tidak dapat dikembalikan!</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> No</button>
                                    <a class="btn btn-danger" href="?p=outgoing.delete&q=<?php echo $row['id_sk']; ?>"> Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DELETE -->
                    <?php
                        }
                    ?>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
               