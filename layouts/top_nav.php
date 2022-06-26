<!-- NAVBAR -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="./home.php"><span>ParkirApps</span></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"  
                        data-toggle="dropdown"><span><?= ucwords($_SESSION['username']) ?></span> <i><img src='./assets/img/panah.jpg' /></i> </a>
                    <ul class="dropdown-menu">
                        <li >
                            <form name="login" method="post" action="">
                                <!-- <p class="login button"> -->
                                <input type="submit" name="logout" class="btn btn-danger" value="Logout" style="width: 100%;margin-top: -2px" />
                                <!-- </p> -->
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->