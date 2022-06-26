<?php 
    date_default_timezone_set("Asia/Jakarta"); 
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
    $rows = $func->getDataParkir($id);

    if (isset($_POST["submit"])) {
        if ($func->addEditDataParkir($_POST) > 0){
            echo "
            <script>
            alert('TIKET BERHASIL DIBUAT');
            document.location.href = 'qr.php';
        </script>
        ";
    }
        else {
            die('ERROR: data gagal '.$data.': '. mysqli_error($data));
        }
    }
?>

<?= include('layouts/style.php') ?>

<style>
.container{width: 600px;margin:auto;}
    h1{text-decoration: underline;}
    label{display:  inline-block;}
      /* Menyembunyikan radio button */
        label > input{ 
          visibility: hidden; 
          position: relative; 
          
         
        }
        /* style gambar */
        label > input + img{ 
          cursor:pointer;
          border:2px solid transparent;
          width: 55%;
          height: 140px;
        }
        /* memberikan style pada gambar yang dipilih */
        label > input:checked + img{
          border: 2px solid #ff00cb;
        }
</style>

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
                        <h1>CHECK-IN</h1>
                        <p></p>
                        <h5>Choose your vehicle!</h5>
                       
                        <hr>
                        
                        <div class="row">
                                 <?php 
                                    $qty = 250;
                                    foreach($rows['count_parkir'] as $jml) : 
                                ?>
                                <div class="col-xs-6">
                                   <?= intval($jml) >= $qty ? 'none' : '' ?>
                                </div>
                                
                                <div class="col-xs-6">
                                <h5 style=" text-align: right;">Available:</h5>
                                    <h2><p style="font-weight:bold;float: right;display:<?= intval($jml) >= $qty ? 'none' : '' ?>"><?php echo $qty - intval($jml) ?></p></h2>
                                </div>
                            </div>
                                <?php if(intval($jml) >= $qty) : ?>
                                <div class="alert alert-warning alert-dismissible" style="margin-top: 20px" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-warning"></i> FULL
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?> 
          
                        <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['id']?>">
                                <input type="hidden" name="created_at" value="<?php echo date("Y-m-d\TH:i:s"); ?>" readonly="readonly">
                             
                                <div class="form-group">
                                       
                                       
                                    <label >
                                        <input type="radio" name="type" value="Motor">
                                        <img src="assets/img/fix1.png">
                                    </label>
                                    <label>
                                        <input type="radio" name="type" value="Mobil">
                                        <img src="assets/img/fix2.png">
                                    </label>
                                   
                                   
                                </div>
                               
                                <input type="submit" name="submit" value="GET TICKET" class="btn btn-success">
                            </form>
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
				<p class="copyright">&copy; 2022 <a href="" target="_blank">ParkirApps</a>. All Rights Reserved.</p>
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