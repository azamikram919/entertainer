<nav class="navbar sticky-top navbar-fixed-top navbar-expand-lg navbar-light">
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="index.php">
            <img src="img/facebook.png" class="d-inline-block align-top" alt="logo"
                 loading="lazy">
        </a>
    </nav>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
            <div class="input-group">
                <input type="text" name="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <button type="submit" name="" class="btn btn-danger">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav mr-auto" style="margin-left: 8%; ">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><span class="sr-only">(current)</span>
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="watch.php">
                    <i class="fa fa-tv"></i> Watch
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-users"></i> Groups
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-gamepad" aria-hidden="true"></i> Gaming
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="https://github.com/azamikram919" class="nav-link">
                    <i class="fab fa-github"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <div class="row nav">
                        <div class="col-xs-2">
                            <a href="#">
                                <img src="img/logo.jpg" alt="profile">
                            </a>
                        </div>
                        <div class="col-xs-10"></div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" style="margin-top: 8px">Manage User On Xaim Ikram</a>
                    <hr>
                    <a class="dropdown-item" href="#"><i class="fas fa-tools"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav><!--close Navbar-->