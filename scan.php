<?php  

require('vendor/autoload.php');
include_once('functions.php');  
use Zxing\QrReader;
$func = new functions();
$msg = "";
if (isset($_POST['submit'])) {
  
  $filename = $_FILES["qrCode"]["name"];
  $filetype = $_FILES["qrCode"]["type"];
  $filetemp = $_FILES["qrCode"]["tmp_name"];
  $filesize = $_FILES["qrCode"]["size"];

  $filetype = explode("/", $filetype);
  if ($filetype[0] !== "image") {
    $msg = "File type is invalid: " . $filetype[1];
  } elseif ($filesize > 5242880) {
    $msg = "File size is too big. Maximum size is 5 MB.";
  } else {
    $newfilename = md5(rand() . time()) . $filename;
    move_uploaded_file($filetemp, "assets/img/temp3/" . $newfilename);

    $qrScan = new QrReader("assets/img/temp3/" . $newfilename);
    $msg = $qrScan->text();
}

if ($func->updateTime($_POST) > 0){
    header("Location:transaksi.php?code=".$msg); 
}
else {
    die('ERROR: data gagal '.$data.': '. mysqli_error($data));
}
}
    
    
    if(isset($_POST['logout'])){  
        // remove all session variables  
        session_unset();   
  
        // destroy the session   
        session_destroy();  
    }  
    if(!($_SESSION)){  
        header("Location:index.php");  
    }  

   
    
    // if (isset($_POST["submit"])) {
    //     if ($func->updateTime($_POST) > 0){
    //         header("Location:transaksi.php?code=".$_POST['code']); 
    //     }
    //     else {
    //         die('ERROR: data gagal '.$data.': '. mysqli_error($data));
    //     }
    // }
 
    
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
            <div class="container py-5">
            <div class="row">
            <div class="col-lg-5 mx-auto">
                <!-- <?= $msg; ?> -->
                <div class="card card-body p-5 rounded border bg-white">
                <h1 class="mb-4 text-center">QR Code Scanner</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="qrCode" class="form-label">Upload your QR Code Image</label>
                    <input class="form-control" type="file" accept="image/*" name="qrCode" id="qrCode">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                    Submit
                    </button>
                </form>
                </div>

            </div>
            </div>
        </div>
            <!-- <div class="main-content">
                <div class="container-fluid">
                    <h1 style="margin-top:-30px">Scan QRCode Parkir</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <video id="preview" width="100%"></video>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="post">
                                <label>SCAN QR CODE</label>
                                <input type="text" name="code" id="textt" readonly="" placeholder="scan qrcode"
                                    class="form-control">
                                <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary" style="margin-top:20px">
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="assets/scripts/klorofil-common.js"></script>
    
    <!-- <script>
        if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices) {
  console.log("Let's get this party started")
}
navigator.mediaDevices.getUserMedia({video: true})
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found');
            }

        }).catch(function (e) {
            console.error(e);
        });

        scanner.addListener('scan', function (c) {
            document.getElementById('text').value = c;
        });
    </script> -->
</body>

</html>