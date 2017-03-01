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
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nomor Surat</th>
                        <th>Tujuan</th>
                        <th>Pemeriksa</th>
                        <th>Perihal</th>
                        <th style="text-align: center;"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT id_sk, nosk, tglsurat, pengirim, perihal, id_us, uac, status 
                                FROM tb_suratkeluar WHERE id_us = '7' ORDER BY id_sk DESC";
                        $res = $conn->query($sql);
                        $no = 0;
                        foreach ($res as $row) {

                            $uac = $row['uac'];

                            if ($uac == "ADM"){
                                $uac = 'ke Staf TU';
                            }elseif($uac == "SWN"){
                                $uac = 'ke Sekwan';
                            }elseif($uac == "KPH"){
                                $uac = 'Ditolak';
                            }else{
                                echo 'Oops!';
                            }

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
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo DateIndo($row['tglsurat']); ?></td>
                        <td><?php echo $nosk;?></td>
                        <td><?php echo $row['pengirim'];?></td>
                        <td><?php echo $uac;?></td>
                        <td><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>"><?php echo $status."</a> ".$row['perihal']; ?></a></td>
                        <td style="text-align:center;">
                        <a title="Delete Data" data-toggle="modal" data-target="#delete<?php echo $row['id_sk']; ?>" aria-hidden="true"><i class="fa fa-times text-danger"></i></a>
                        </td>
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
               