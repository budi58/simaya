<!DOCTYPE html>
<html>
<head>
    <title>Disposisi Sekretaris</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print(); ">
<div class="container-fluid">
<div class="col-lg-10 col-md-offset-1">
<br/>

<?php
    $getId  = isset($_GET['q']) ? $_GET['q']: '';

    $sql    = "SELECT tb_suratmasuk.id_sm, tb_suratmasuk.tglaccept, tb_suratmasuk.nosurat, tb_suratmasuk.tglsurat, tb_suratmasuk.pengirim, tb_dispo.dispo, tb_dispo.isidispo, tb_dispo.tembusan, tb_dispo.isi_tindakan, tb_bagian.bagian, tb_user.bgn
            FROM `tb_suratmasuk` 
            INNER JOIN `tb_dispo` ON (`tb_suratmasuk`.`id_sm` = `tb_dispo`.`id_dispo`)
            INNER JOIN `tb_user` ON (`tb_dispo`.`dispo` = `tb_user`.`uac`)
            INNER JOIN `tb_bagian` ON (`tb_dispo`.`tembusan` = `tb_bagian`.`uac`)
        WHERE `tb_suratmasuk`.`id_sm` = '".$getId."'"; 

    $res    = $conn->query($sql);
    $row    = $res->fetch_assoc();

    $query  = "SELECT *FROM tb_kantor";
    $res    = $conn->query($query);
    $rows   = $res->fetch_assoc();
?>

<table width='100%' style='font-family: "Arial"; '> 
    <td width='100'><img src="img/<?php echo $rows['logo']; ?>" width='75' height='105' align='center'></td>
        <td align='center'>
            <font size='4'><b>PEMERINTAH <?php echo $rows['kab']; ?></b></font><br/>
            <font size='5'><b>SEKRETARIAT <?php echo $rows['kantor']; ?></b></font><br/>
            <font size='3'><?php echo $rows['alamat']."  Kode Pos : ".$rows['pos']; ?></font><br/>
            <font size='3'>Telepon : <?php echo $rows['telp']."  Fax : ".$rows['faks']; ?></font>
        </td>
</table>

<hr style='border: double; align:center;'>
<div class="row">
    <div class="col-lg-6">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Surat dari</td>
                        <td>: </td><td><?php echo $row['pengirim']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Surat</td>
                        <td>: </td><td><?php echo DateIndo($row['tglsurat']); ?></td>
                    </tr>
                    <tr>
                        <td>Nomer Surat</td>
                        <td>: </td><td><?php echo $row['nosurat']; ?></td>
                    </tr>  
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Diterima tanggal</td>
                        <td>: </td><td><?php echo DateIndo($row['tglaccept']); ?></td>
                    </tr>
                    <tr>
                        <td>Nomer Agenda</td>
                        <td>: </td><td><?php echo $row['id_sm']; ?></td>
                    </tr>
                    <tr>
                        <td>Diteruskan kepada</td>
                        <td>: </td><td><?php echo $row['bgn']; ?></td>
                    </tr>   
                </table>
            </div>
        </div>
    </div>
</div>

<table align="center" style="font-family: 'Arial';">
    <td style="font-size: 16px; font-weight: bold; text-decoration: underline;"> DISPOSISI</td>
</table>

<table align="left" style="font-family: 'Arial';">
    <tr>
        <td style="padding-left: 20px; font-size: 16px; font-weight: bold; text-decoration: underline;">SEKWAN :</td>
    </tr>
    <tr>
        <td style="padding-left: 20px; font-size: 17px;"><?php echo $row['bgn']."<br> ".$row['isidispo']; ?></td>
    </tr>
</table>

<table align="right" style="font-family: 'Arial';">  
    <tr>
        <td align="right" style="font-size: 16px; font-weight: bold; text-decoration: underline;">KABAG.</td>
    </tr>
    <tr>
        <td style="font-size: 17px;"><?php echo $row['bagian']."<br> ".$row['isi_tindakan']; ?></td>
    </tr>
</table>

    </div>
</div>
</body>
</html>
