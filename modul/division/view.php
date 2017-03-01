            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Daftar Bagian</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Daftar Bagian</strong>
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
                        <h5>Daftar Bagian</h5>
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

                    <div class="">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#add" aria-hidden="true">Add new</a>
                    </div>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th>Nama Bagian</th>
                            <th>UAC</th>
                            <th style="text-align: center;"><span class="glyphicon glyphicon-cog"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM tb_bagian ORDER BY id_bagian DESC";
                            $res = $conn->query($sql);
                            $no = 0;
                            foreach ($res as $row) {
                            $no++;
                        ?>
                                 
                    <tr class="odd gradeX">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['bagian']; ?></td>
                        <td><?php echo $row['uac']; ?></td>

                        <td style="text-align:center;"> 

                            <a title="Edit Data" data-toggle="modal" data-target="#edit<?php echo $row['id_bagian']; ?>"><i class="fa fa-check text-navy"></i></a>

                        </td>
                    </tr>

                    <!-- MODAL -->
                    <!-- BEGIN ADD -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Data Bagian</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="?p=division.action" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Bagian</label>
                                        <div class="col-sm-8"><input type="text" name="bagian" class="form-control" required=""> 
                                        </div>
                                    </div><br/>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">UAC</label>
                                        <div class="col-sm-8"><input type="text" name="uac" class="form-control" required=""> 
                                        </div>
                                    </div><br/>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                                        <button type="submit" name="save" class="btn btn-primary"> Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- END ADD -->

                    <!-- BEGIN EDIT -->
                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="edit<?php echo $row['id_bagian']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Data Bagian</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="?p=division.action" method="post" class="form-horizontal">
                                    <input type="hidden" name="q" value="<?php echo $row['id_bagian']; ?>"/>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Bagian</label>
                                        <div class="col-sm-8"><input type="text" name="bagian" class="form-control" value="<?php echo $row['bagian']; ?>"> 
                                        </div>
                                    </div><br/>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">UAC</label>
                                        <div class="col-sm-8"><input type="text" name="uac" class="form-control" value="<?php echo $row['uac']; ?>"> 
                                        </div>
                                    </div><br/>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                                        <button type="submit" name="update" class="btn btn-primary"> Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- END EDIT -->

                    <!-- BEGIN DELETE -->
                    <div class="modal inmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="delete<?php echo $row['id_bagian']; ?>" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"> Hapus Data Bagian?</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="">Data yang sudah terhapus tidak dapat dikembalikan!</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> No</button>
                                    <a class="btn btn-danger" href="?p=division.delete&q=<?php echo $row['id_bagian']; ?>"> Yes</a>
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
               