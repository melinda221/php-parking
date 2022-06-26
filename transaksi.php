<?php 
    date_default_timezone_set("Asia/Jakarta"); 
    //library phpqrcode
    include "phpqrcode/qrlib.php";
    
    $tempdir2 = "assets/img/temp2/"; 
    if (!file_exists($tempdir2))
    mkdir($tempdir2);
    

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
    
    $code = $_GET['code'];
    $func = new functions();

    $rows = $func->transaction($code);

    var_dump($rows);

?>

<style>

</style>
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
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1>Check-Out Parkir</h1>
                                </div>
                                <?php foreach($rows as $row) : ?>
                                <div class="col-md-6">
                                    <a href="tiket.php?id=<?= $row['id']; ?>" class="btn btn-danger"
                                        style="float:right;margin-top: 15px">UNDUH PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
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
                                        </tbody>
                                        
                                    </table>
                                    <?php
                                        $startHour = new DateTime($row['created_at']);
                                        $endHour = new DateTime($row['updated_at']);

                                        $result_hour = $startHour->diff($endHour);
                                        $time_spent = $result_hour->format('%h Jam %i Menit %s Detik');
                                    ?>
                                    <label for="parkir">Lama Parkir :</label>
                                    <p><?= $time_spent; ?></p>
                                    <label for="jml">Jumlah yang harus dibayar :</label>
                                    <?php
                                         $jenis_kendaraan=$row['type'];
                                         if ($jenis_kendaraan == 'Motor' ) {
                                             $costPerHour = 2000;
                                         } else{
                                             $costPerHour = 4000;
                                         }
                                         
                                        $time_spent_2 = $result_hour->format('%h');
                                        if ($time_spent_2 == 0) {
                                            $pay = $costPerHour;
                                        } else {
                                            $pay = $time_spent_2*$costPerHour;
                                        }
                                        ?>
                                        <p style="font-weight:bold">Rp.<?= $pay ?></p>
                                   
                                    <label for="jml">Link Pembayaran QRIS :</label>
                                    <p></p>
                                    
                                        <?php
                                       
                                        $url = "http://localhost:8001/buy/product/submit";
                                        $curl = curl_init();
                                        curl_setopt($curl, CURLOPT_URL, $url);
                                        curl_setopt($curl, CURLOPT_POST, true);
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                        
                                        $headers = array(
                                            "Accept: application/json",
                                            "Content-Type: application/json",
                                            'authentication: $2y$10$Y5b0VLT0XzE7k4xdIDv7GeUuHMaugfh2sfgw3c8rspmtGwCEffCDu',
                                           
                                         );
                                        
                                         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);  
                                                                        
                                         $transaction = array(
                                            'payment_method' => 'qris',
                                            'total_amount' => $pay,
                                            'order_id' => $row['code']
                                            
                                        );
                                        

                                        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($transaction));
                                        $resp = curl_exec($curl);
                                        curl_close($curl);
                                        $jsonObject = json_decode($resp);
                                        $jsonn = json_encode($resp);

                                        // parsing json   
                                        // $order_id = $jsonObject->order_id;
                                        // $transaction_id = $jsonObject->transaction_id;
                                        // $status_code = $jsonObject->status_code;
                                        // $gross_amount = $jsonObject->gross_amount;
                                        // $transaction_status = $jsonObject->transaction_status;

                                        // $fraud_status = $jsonObject->fraud_status;
                                        
                                        $paymentUrl = $jsonObject->result->actions[0]->url;
                                        $qris = $jsonObject->result->qr_string;
                                        // $code = $jsonObject->code;

                                        
                                        // echo( $jsonn);
                                        
                                    ?>
                                    <?php
                                                //Isi dari QRCode Saat discan
                                                $isi_teks2 = $qris;
                                                //Nama file yang akan disimpan pada folder temp 
                                                $namafile2 =  $row['code'].".png";
                                                //Kualitas dari QRCode 
                                                $quality2 = 'H'; 
                                                //Ukuran besar QRCode
                                                $ukuran2 = 3; 
                                                $padding2 = 0; 
                                                QRCode::png($isi_teks2,$tempdir2.$namafile2,$quality2,$ukuran2,$padding2);
                                                
                                            ?>
                                            <td>
                                                    <img src="assets/img/temp2/<?php echo $namafile2; ?>">
                                                    <p></p><button onclick="JavaScript:window.location.href='downloadqris.php?file=<?=$namafile2?>';"> Download QRIS</button><br />
                                                    <h5>*Download QRIS, jangan sampai hilang!</h5>
                                            </td>
                                                                  
                                    <?php endforeach; ?>
                                    <p></p>
                                   <!-- <?php echo( $paymentUrl);?> -->
                                        
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