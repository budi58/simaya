        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">

<?php
    if ((isset($_POST['cari'])) AND ($_POST['search'] <> "")) {
        $search = $_POST['search'];
        $sql1 = "SELECT * FROM tb_suratmasuk 
                    WHERE perihal LIKE '%$search%' OR 
                            pengirim LIKE '%$search' OR 
                            nosurat LIKE '%$search' OR 
                            tglaccept LIKE '%$search'";

        $res = $conn->query($sql1);
        $jumlah1 = mysqli_num_rows($res);
     
        if ($jumlah1 > 0){
            echo '<h2>'.$jumlah1.' results surat masuk found for: <span class="text-navy">"'.$search.'"</span></h2>';
        
        foreach ($res as $row1) {
            echo'<div class="hr-line-dashed"></div>
                <div class="search-result">
                    <h3><a href="?p=incoming.review&q='.$row1['id_sm'].'">'.$row1['perihal'].'</a></h3>
                    <a href="?p=incoming.review&q='.$row1['id_sm'].' " class="search-link">Surat Masuk '.$row1['pengirim'].' '.$row1['perihal'].' '.DateIndo($row1['tglaccept']).' '.$row1['nosurat'].'</a>
                </div>';
            }
        }else{

        $sql2 = "SELECT * FROM tb_suratkeluar 
                    WHERE perihal LIKE '%$search%' OR 
                            pengirim LIKE '%$search' OR 
                            nosk LIKE '%$search' OR 
                            tglsurat LIKE '%$search'";

        $res = $conn->query($sql2);
        $jumlah2 = mysqli_num_rows($res);
      
        if ($jumlah2 > 0){
            echo '<h2>'.$jumlah2.' results surat keluar found for: <span class="text-navy">"'.$search.'"</span></h2>';
           
        foreach ($res as $row2) {
            echo'<div class="hr-line-dashed"></div>
                    <div class="search-result">
                        <h3><a href="?p=outgoing.review&q='.$row2['id_sk'].'">'.$row2['perihal'].'</a></h3>
                        <a href="?p=outgoing.review&q='.$row2['id_sk'].' " class="search-link">Surat Keluar '.$row2['pengirim'].' '.$row2['perihal'].' '.DateIndo($row2['tglsurat']).' '.$row2['nosk'].'</a>
                    </div>';
                }
        }else{
            echo "<h2>Not Found! </h2> <h5>Data yang kamu cari tidak ada pada database.</h5>";
            }
        }
    }else{
        echo '<h2>Not Found! </h2>Silahkan masukkan kata kunci yang kamu cari dengan benar.';
    }
?> 

                        
                    <div class="hr-line-dashed"></div>
                        
                    </div>
                </div>
        </div>
        </div>