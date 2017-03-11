<?php

$sql      = mysqli_query($conn, "SELECT *FROM tb_suratmasuk WHERE id_ag = '1' AND status = '1' ");
$JmlSMK   = mysqli_num_rows($sql);

$sql      = mysqli_query($conn, "SELECT *FROM tb_suratmasuk WHERE id_ag = '2' AND status = '1' ");
$JmlSMS   = mysqli_num_rows($sql);

$sql      = mysqli_query($conn, "SELECT *FROM tb_dispo");
$JmlDispo = mysqli_num_rows($sql); 

$sql      = mysqli_query($conn, "SELECT *FROM tb_suratkeluar");
$JmlSK    = mysqli_num_rows($sql);


if ($_SESSION['uac'] == 'ADM'){
?>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li><a href="?p=user.new">Tambah User</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=incoming.read">Surat Masuk<span class="label label-primary pull-right"><?php echo $JmlDispo; ?></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                            <li><a href="?p=incoming.new">Surat Manual</a></li>
                            <li><a href="?p=incoming.reject">Tolak<span class="label label-info pull-right"></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Keluar</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=outgoing.read">Surat Keluar<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.new">Buat Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label"> Referensi Data</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=division.view">Daftar Bagian</a></li>
                            <li><a href="?p=sender.view">Daftar Pengirim</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KSBG') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=incoming.read">Surat Masuk<span class="label label-primary pull-right"><?php echo $JmlDispo; ?></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KBG') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=incoming.read">Surat Masuk<span class="label label-primary pull-right"><?php echo $JmlDispo; ?></span></a></li>
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Keluar</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=outgoing.read">Surat Keluar<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.reject">Tolak<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.new">Buat Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KBGR') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Keluar</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=outgoing.read">Surat Keluar<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.reject">Tolak<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.new">Buat Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KPH') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Keluar</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=outgoing.read">Surat Keluar<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.reject">Tolak<span class="label label-info pull-right"></span></a></li>
                            <li><a href="?p=outgoing.new">Buat Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'SWN') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama'] ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn'] ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=incoming.read">Surat Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=outgoing.read"><i class="fa fa-envelope"></i> <span class="nav-label">Surat Keluar</span><span class="label label-info pull-right"></span></a>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KOMA') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KOMB') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KOMC') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'KOMD') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=disposition.read">Dispo Masuk<span class="label label-primary pull-right"></span></a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php
} elseif ($_SESSION['uac'] == 'DWN') {
?>

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama'] ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION['bgn'] ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="?p=user.profil">Profile</a></li>
                                <li><a href="?p=user.password">Ganti Password</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            SM+
                        </div>
                    </li>
                    <li>
                        <a href="?p=home"><i class="fa fa-home"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">Surat Masuk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="?p=incoming.read">Surat Masuk</a></li>
                            <li><a href="?p=incoming.ketua">Surat Ketua<span class="label label-info pull-right"><?php echo $JmlSMK; ?></span></a></li>
                            <li><a href="?p=incoming.sekwan">Surat Sekretaris<span class="label label-info pull-right"><?php echo $JmlSMS; ?></span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?p=agenda.report"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Agenda</span></a>
                    </li>
                </ul>
            </div>
        </nav>

<?php 
}else{
?>

<?php
    }
?>

    <div id="page-wrapper" class="gray-bg dashboard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="?p=search" method="post">
                <div class="input-group">
                    <input type="text" placeholder="Search.." class="form-control" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-primary" type="submit" name="cari">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">siMAYA v.0.4-devel</span>
                </li>
                
                
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-lock"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="?p=seting.profile"> Instansi</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"> Log out...</a>
                        </li>
                        
                    </ul>
                </li>     
            </ul>
        </nav>
    </div>

        <div class="footer">
            <div>
                <strong>Copyright</strong> siMAYA &copy; 2016-<?php echo date("Y") ?>
            </div>
        </div>