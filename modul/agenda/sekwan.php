<!DOCTYPE html>
<html>
<head>
    <title>Agenda Surat Masuk Sekretaris</title>
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
            <font size="2"><b>AGENDA SURAT MASUK SEKRETARIS</b></font><br/>
            <font size="2">Periode : <?php echo DateIndo($start)." - ".DateIndo($end); ?></font>
        </td>
</table>

<hr style="border: double;">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Terima</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Perihal</th>
            <th>Pengirim</th>
            <th>Sifat</th>
            <th>Dispo</th>
            <th>Isi Dispo</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sql    = "SELECT tb_suratmasuk.tglaccept, tb_suratmasuk.nosurat, tb_suratmasuk.tglsurat, tb_suratmasuk.perihal, tb_suratmasuk.pengirim, tb_suratmasuk.file, tb_agenda.agenda, tb_sifat.sifat, tb_dispo.dispo, tb_dispo.isidispo, tb_bagian.bagian
                            FROM `tb_suratmasuk` 
                            INNER JOIN `tb_sifat` ON (`tb_suratmasuk`.`id_sifat` = `tb_sifat`.`id_sifat`)
                            INNER JOIN `tb_agenda` ON (`tb_suratmasuk`.`id_ag` = `tb_agenda`.`id_ag`)
                            INNER JOIN `tb_dispo` ON (`tb_suratmasuk`.`id_sm` = `tb_dispo`.`id_dispo`)
                            INNER JOIN `tb_bagian` ON (`tb_dispo`.`dispo` = `tb_bagian`.`uac`)
                        WHERE tb_suratmasuk.id_ag = '2' AND tb_suratmasuk.tglaccept BETWEEN '{$start}' AND '{$end}' AND tb_suratmasuk.status = '1' ";

                $res = $conn->query($sql);
                        
                $no = 0;
                foreach ($res as $row) {
                $no++;
            ?>                     
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo date_format(date_create($row['tglaccept']), 'd-m-Y'); ?></td>
            <td><?php echo $row['nosurat']; ?></td>
            <td><?php echo date_format(date_create($row['tglsurat']), 'd-m-Y'); ?></td>
            <td><?php echo $row['perihal']; ?></td>
            <td><?php echo $row['pengirim']; ?></td>
            <td><?php echo $row['sifat']; ?></td>
            <td><?php echo $row['bagian']; ?></td>
            <td><?php echo $row['isidispo']; ?></td>
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
