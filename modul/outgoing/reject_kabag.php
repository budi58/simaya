            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Surat Keluar</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Surat Keluar Ditolak</strong>
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
                        <th>Perihal</th>
                        <th>Pengirim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT id_sk, nosk, tglsurat, perihal, pengirim, id_us, status 
                                FROM tb_suratkeluar WHERE uac = 'KBG' ORDER BY id_sk DESC";

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
                        <td><?php echo $nosk; ?></td>
                        <td><?php echo $row['pengirim'];?></td>
                        <td><?php echo $row['perihal'];?></td>
                        <td><a href="?p=outgoing.review&q=<?php echo $row['id_sk']; ?>"><?php echo $status."</a> ".$_SESSION['bagian']; ?></td>
                    </tr>
                    
                    <?php
                        }
                    ?>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>