<!DOCTYPE html>
<html>
<head>
    <title>Surat Keluar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print(); ">
<div class="container-fluid">
<div class="col-lg-10 col-md-offset-1">
<br/>

<?php
    $getId  = isset($_GET['q']) ? $_GET['q']: '';

    $sql    = "SELECT id_sk, isisurat FROM tb_suratkeluar WHERE id_sk = '".$getId."'"; 
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
            <font size='3'>Telepon : <?php echo $rows['telp']."  Fax : ".$rows['faks']."  Website : ".$rows['web']; ?></font>
        </td>
</table>
<hr style='border: double; align:center;'>
<br/>
<?php echo $row['isisurat']; ?>

<br/>

<table align="right" style='font-family: "Arial"; font-size: 18px;'>  
    <tr>
        <td style="text-align: center;">Pati, <?php echo "".$tgl_skrg." ".$nama_bln[$bln_sekarang]." ".$thn_sekarang."" ?></td>
    </tr>
    <tr>
        <td>SEKRETARIS DPRD KABUPATEN PATI</td>
    </tr>
    <tr>
        <td style="padding-top:70px; text-align: center;"><b><u>IFAN BUSTANUDDIN, SE, MM</u></b><br/>Pembina Utama Muda<br/>NIP. 196412131992031008</td>
    </tr>
</table>

    </div>
</div>
<br/>
</body>
</html>
