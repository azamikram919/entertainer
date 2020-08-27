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
    <title>Edit User Profile</title>
</head>
<body>
<?php require_once 'inc/navbar.php' ?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center my-5 user-profile">
        <form method="get" enctype="multipart/form-data">
            <h2 class="h2">Edit Profile Picture</h2>

            <img src="" class="my-3 rounded-circle" alt=""
                 data-holder-rendered="true" style="width: 250px; height:250px; ">
            <br>
            <label for="edit-profile">
                <i class="fa fa-camera" style="cursor:pointer; font-size: 25px; color: #f1b0b7;"></i>
                <input type="file" name="file" id="edit-profile" style="display: none"/>
                <br>
                <!--<button type="button" id="edit-user-profile" class="my-3 btn btn-sm" value=""
                        style="background: #f1b0b7; color: #fff;">Edit Profile
                </button>-->
            </label>
        </form>
    </div>
</div>

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>