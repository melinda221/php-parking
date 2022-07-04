<?php   
    include_once('functions.php'); 
   

    $func = new functions();

    if (isset($_POST["submit"])) {
        if($_POST["password"] == $_POST["conf"]){
        if ($func->addEditDataUser($_POST) > 0){
                echo "
                <script>
                alert('Akun Berhasil DIBUAT!');
                document.location.href = 'index.php';
            </script>
            ";
        }
        // elseif($_POST["password"] != $_POST["conf"]){
		// 	echo "password tidak sama";
        // }
        else {
            die('ERROR: data gagal '.$data_user.': '. mysqli_error($data_user));
        }
    }else{
        echo "
                <script>
                alert('passwordnya woi!');
            </script>
            ";
    }

}
?>

<style>

</style>
<?= include('layouts/style.php') ?>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
       

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h1 style="margin-top:-30px">User Registration</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <!-- <input type="hidden" name="id" value="<?= $_SESSION["user_id"]?>"> -->
                                <input type="hidden" name="created_at" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly="readonly">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email :</label>
                                    <input type="name" class="form-control" name="email" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usename :</label>
                                    <input type="name" class="form-control" name="username" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputPassword1">Password :</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password :</label>
                                    <input type="password" class="form-control" name="conf" id="exampleInputPassword1">
                                </div>
                               
                                
                                <input type="submit" name="submit" value="Register" class="btn btn-success">
                            </form>
                            <a href="index.php">Sudah punya akun?</a>
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