            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Laporan Agenda Surat</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="?p=home">Home</a>
                        </li>
                        <li class="active">
                            <strong>Laporan Agenda Surat</strong>
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
                        <h5>Agenda Surat Masuk Ketua</h5>
                    </div>
                    <div class="ibox-content">

                        <form action="print.php?s=agenda.ketua" target="_blank" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                            <div class="form-group" id="data_5">
                                <label class="col-sm-2 control-label">Periode</label>
                                <div class="col-sm-6">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" required="" autocomplete="off"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" required="" autocomplete="off"/>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Tampilkan</button>
                            </div>

                        </form>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Agenda Surat Masuk Sekretaris</h5>
                        
                    </div>
                    <div class="ibox-content">

                        <form action="print.php?s=agenda.sekwan" target="_blank" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                            <div class="form-group" id="data_5">
                                <label class="col-sm-2 control-label">Periode</label>
                                <div class="col-sm-6">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" required="" autocomplete="off"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" required="" autocomplete="off"/>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Tampilkan</button>
                            </div>

                        </form>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Agenda Surat Keluar</h5>
                        
                    </div>
                    <div class="ibox-content">

                        <form action="print.php?s=agenda.suratkeluar" target="_blank" method="post" class="form-horizontal" enctype="multipart/form-data">
                        
                            <div class="form-group" id="data_5">
                                <label class="col-sm-2 control-label">Periode</label>
                                <div class="col-sm-6">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" name="start" required="" autocomplete="off" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="end" required="" autocomplete="off" />
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Tampilkan</button>
                            </div>

                        </form>
                    </div>
                </div>
