<?php
session_start();
require_once 'inc/env.php';
require_once 'inc/conn.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

//if (isset($_SESSION['user_id'])) {
//    $edit_query = "SELECT * FROM `user` WHERE id = '" . $_SESSION['user_id'] . "'";
//    $run = mysqli_query($con, $edit_query);
//    if (mysqli_num_rows($run) > 0) {
//        $row = mysqli_fetch_array($run);
//        $image = $row['image'];
//    }
//}

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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Facebook</title>
</head>
<body>
<?php require_once 'inc/navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php require_once 'inc/left_sidebar.php' ?>
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="cover-photo mt-2"
                 style="background-image: url('img/cover.jpg'); background-size: cover; background-repeat: no-repeat;
                min-height: 200px; width: 100%; border-radius: 8px">

                <img src="images/<?= $image?>" class="my-3 rounded-circle" id="img" alt="" data-holder-rendered="true"
                     style="width: 250px; height:250px; margin-left: 30%">

            </div>
            <div class="get-post-feed-list-wrapper">

            </div>
        </div>
    </div>
</div>

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>