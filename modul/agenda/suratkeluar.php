<!DOCTYPE html>
<html>
<head>
    <title>Agenda Surat Keluar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print(); ">
<div class="container-fluid">
<div class="col-lg-12 col-md-offset-0">
<br/>

<?php
    $tgl     = explode('/',$_POST['start']);
    $start   = $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

    $tgl     = explode('/',$_POST['end']);
    $end     = $tgl['2'].'-'.$tgl['1'].'-'.$tgl['0'];

    $query = "SELECT *FROM tb_kantor";
    $res = $conn->query($query);
    $rows = $res->fetch_assoc();
?>

<table width='100%' style='font-family: "Arial"; '> 
    <td width='100'><img src="img/<?php echo $rows['logo']; ?>" width='50' height='73' align='left'></td>
        <td align='left'>
            <font size='2'><b>PEMERINTAH <?php echo $rows['kab']; ?></b></font><br/>
            <font size='2'><b>SEKRETARIAT <?php echo $rows['kantor']; ?></b></font><br/>
            <font size='1'><?php echo $rows['alamat']."  Kode Pos : ".$rows['pos']; ?></font><br/>
            <font size='1'>Telepon : <?php echo $rows['telp']."  Fax : ".$rows['faks']; ?></font>
        </td>
        <td align="right">
            <font size="2"><b>AGENDA SURAT KELUAR</b></font><br/>
            <font size="2">Periode : <?php echo DateIndo($start)." - ".DateIndo($end); ?></font>
        </td>
</table>

<hr style="border: double;">

    <table class="table table-bordered" >
        <thead>
        <tr>
            <th>No</th>
            <th>No. Surat</th>
            <th>Tanggal</th>
            <th>Dari</th>
            <th>Tujuan</th>
            <th>Perihal</th>
            <th>Sifat</th>
            <th>Jenis</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT tb_suratkeluar.id_sk, tb_suratkeluar.nosk, tb_suratkeluar.tglsurat, tb_suratkeluar.pengirim, tb_suratkeluar.perihal, tb_user.bgn, tb_sifat.sifat, tb_jenis.jenis, tb_suratkeluar.uac, tb_suratkeluar.status FROM tb_suratkeluar
                    INNER JOIN `tb_sifat` ON (`tb_suratkeluar`.`id_sifat` = `tb_sifat`.`id_sifat`)
                    INNER JOIN `tb_jenis` ON (`tb_suratkeluar`.`id_jenis` = `tb_jenis`.`id_jenis`)
                    INNER JOIN `tb_user` ON (`tb_suratkeluar`.`id_us` = `tb_user`.`id_us`) 
                    WHERE tb_suratkeluar.tglsurat BETWEEN '{$start}' AND '{$end}' AND tb_suratkeluar.status = '1' ";
                    
                $res = $conn->query($sql);
                        
                $no = 0;
                foreach ($res as $row) {
                $no++;
            ?>                    
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nosk']; ?></td>
            <td><?php echo DateIndo2($row['tglsurat']); ?></td>
            <td><?php echo $row['bgn']; ?></td>
            <td><?php echo $row['pengirim'];?></td>
            <td><?php echo $row['perihal'];?></td>
            <td><?php echo $row['sifat'];?></td>
            <td><?php echo $row['jenis'];?></td>
        </tr>
                    
            <?php
                }
            ?>

        </tbody>
        </table>
    </div>
</div>
</body>
</html>
