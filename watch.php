<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/title.png">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Facebook</title>
</head>
<body>
<?php require_once 'inc/navbar.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 left_sid">
            <h3 class="h3">Watch</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="search-title" placeholder="Search for...">
            </div>
            <hr>
            <a href="#">
                <h6><img src="img/tev.png" alt="logo"> Home</h6>
            </a>
            <a href="#">
                <h6><img src="img/play-button.png" alt="logo"> Shows</h6>
            </a>
            <a href="#">
                <h6><img src="img/live.png" alt="logo" width="30px"> Live</h6>
            </a>
            <a href="#">
                <h6><img src="img/save.png" alt="logo"> Save Video</h6>
            </a>
            <hr>
        </div>
        <div class="col-md-9">
            <div class="container">
                <div class="videos">
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="#">
                                <img src="img/logo.jpg" alt="profile logo" class="rounded-circle">
                            </a>
                        </div>
                        <div class="col-sm-9 title">
                            <p>Salman Sports .<a href="#">Follow</a></p>
                            <h4>Today at 2:49 PM . </h4>
                            <h3 class="h3"> Today is new Video</h3>
                        </div>
                        <div class="col-sm-1 dots">
                            <a href="#">
                                <i class="fa fa-ellipsis-h"></i>
                            </a>
                        </div>
                        <video class="post-video" controls>
                            <source src="videos/1.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="inner-post" id="inner-post">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<!--<script src="assets/bootstrap-4.0.0/js/popper.min.js"></script>-->
</body>
</html>