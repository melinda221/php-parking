<?php   
    date_default_timezone_set("Asia/Jakarta"); 
    //library phpqrcode
    include "phpqrcode/qrlib.php";
    
    $tempdir = "assets/img/temp/"; 
    if (!file_exists($tempdir))
    mkdir($tempdir);
    

    include_once('functions.php');  
    if(isset($_POST['logout'])){  
        // remove all session variables  
        session_unset();   
  
        // destroy the session   
        session_destroy();  
    }  
    if(!($_SESSION)){  
        header("Location:index.php");  
    }  

    $func = new functions();

    $id = $_GET['id'];
    $rows = $func->detailParkir($id);

?>

<style>button{margin:5px;cursor:pointer;}</style>

<?= include('layouts/style.php') ?>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <?= include('layouts/top_nav.php') ?>

        <?= include('layouts/side_nav.php') ?>

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1>Detail Parkir</h1>
                                        </div>
                                        <?php foreach($rows as $row) : ?>
                                        <div class="col-md-6">
                                            <a href="tiket.php?id=<?= $row['id']; ?>" class="btn btn-danger"
                                                style="float:right;margin-top: 15px">UNDUH TIKET</a>
                                        </div>
                                    </div>
                                    <hr style="margin: 0">
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped">
                                        <tbody>
                                           
                                            <tr>
                                                <td style="width:25%">Zona :</td>
                                                <td><?= $row['zone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tipe :</td>
                                                <td><?= $row['type'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kendaraan Masuk :</td>
                                                <td><?= $row['created_at'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kendaraan Keluar :</td>
                                                <td><?= $row['updated_at'] == NULL ? 'Status Kendaraan Belum Keluar' : $row['updated_at']  ?></td>
                                            </tr>
                                            <?php
                                                //Isi dari QRCode Saat discan
                                                $isi_teks = $row['code'];
                                                //Nama file yang akan disimpan pada folder temp 
                                                $namafile = $row['code'].".png";
                                                //Kualitas dari QRCode 
                                                $quality = 'H'; 
                                                //Ukuran besar QRCode
                                                $ukuran = 5; 
                                                $padding = 0; 
                                                QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
                                            ?>
                                            <tr>
                                                <td>QR Code :</td>
                                                <td>
                                                    <img src="assets/img/temp/<?php echo $namafile; ?>">
                                                    <p></p><button onclick="JavaScript:window.location.href='download.php?file=<?=$namafile?>';"> Download QR</button><br />
                                                    <h5>*Download QR Code, jangan sampai hilang!</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2022 <a href="https://www.themeineed.com" target="_blank">ParkirApps</a>.
                    All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->

    <!-- Javascript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>