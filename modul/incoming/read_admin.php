
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Surat Masuk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Surat Masuk</strong>
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
                        <h5>Surat Masuk</h5>
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
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nomor Surat</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>Pemeriksa</th>
                        <th>Agenda</th>
                        <th style="text-align: center;"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT `tb_suratmasuk`.`id_sm`, `tb_suratmasuk`.`tglaccept`, `tb_suratmasuk`.`nosurat`, `tb_suratmasuk`.`pengirim`, `tb_agenda`.`agenda`, `tb_suratmasuk`.`perihal`, `tb_suratmasuk`.`uac`, `tb_suratmasuk`.`status` 
                                FROM `tb_suratmasuk` 
                                INNER JOIN `tb_agenda` ON (`tb_suratmasuk`.`id_ag` = `tb_agenda`.`id_ag`)
                                ORDER BY id_sm DESC";

                        $res = $conn->query($sql);
                        
                        $no = 0;
                        foreach ($res as $row) {

                        $uac = $row['uac'];

                            if ($uac == "ADM"){
                                $uac = 'Ditolak';
                            }elseif($uac == "KSBG"){
                                $uac = 'ke Kasubag TU';
                            }elseif($uac == 'KBG'){
                                $uac = 'ke Kabag';
                            }elseif($uac == 'SWN'){
                                $uac = 'ke Sekwan';
                            }elseif ($uac == 'DWN'){
                                $uac = 'ke Ketua';
                            }else{
                                echo 'Oops!';
                            }

                        $status = $row['status'];
                            if ($status == "0"){
                                $status = '<span class="label label-warning">Belum dibaca</span>';
                            }else{
                                $status = '<span class="label label-primary">Sudah dibaca</span>';
                            }
                        $no++;
                    ?>        
                    <tr class="odd gradeX">
                        <td><?php echo $no; ?></td>
                        <td><?php echo DateIndo($row['tglaccept']); ?></td>
                        <td><?php echo $row['nosurat'];?></td>
                        <td><?php echo $row['pengirim'];?></td>
                        <td><?php echo $row['perihal'];?></td>
                        <td><?php echo $uac;?></td>
                        <td><a href="?p=incoming.review&q=<?php echo $row['id_sm']; ?>"><?php echo $status."</a> ".$row['agenda']; ?></td>

                        <td style="text-align:center;"><a title="Delete Data" data-toggle="modal" data-target="#delete<?php echo $row['id_sm']; ?>" aria-hidden="true"><i class="fa fa-times text-danger"></i></a></td>
                    </tr>

                    <!-- MODAL -->
                    <!-- BEGIN DELETE -->
                    <div class="modal inmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="delete<?php echo $row['id_sm']; ?>" >
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
                                    <a class="btn btn-danger" href="?p=incoming.delete&q=<?php echo $row['id_sm']; ?>"> Yes</a>
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