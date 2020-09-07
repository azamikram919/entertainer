<?php
session_start();
require_once 'inc/env.php';
require_once 'inc/conn.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

if (isset($_SESSION['user_id'])) {
    $edit_query = "SELECT * FROM `user` WHERE id = '" . $_SESSION['user_id'] . "'";
    $run = mysqli_query($con, $edit_query);
    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $image = $row['image'];
        $gender = $row['gender'];
    }
}

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
    <title>Edit User Profile</title>
</head>
<body>
<?php require_once 'inc/navbar.php' ?>

<!--<img src="" class="my-3 rounded-circle" id="img" alt=""
     data-holder-rendered="true" style="width: 250px; height:250px; ">
<br>
<label for="edit-profile">
    <i class="fa fa-camera" style="cursor:pointer; font-size: 25px; color: #f1b0b7;"></i>
    <input type="file" name="file" id="edit-profile" style="display: none"/>
    <br>

    <button type="button" id="edit-user-profile" name="sub" class="my-3 btn btn-sm" value=""
            style="background: #f1b0b7; color: #fff;">Upload
    </button>
</label>-->

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">

        <h2 class="h2 text-center mt-3">Edit User Details</h2>
        <br>

        <?php
        if (isset($_POST['submit'])) {
            $id = $row['id'];
            $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $gender = $_POST['gender'];
            $image = mysqli_real_escape_string($con, $_FILES['image'] ['name']);
            $image_tmp = $_FILES['image'] ['tmp_name'];


            if (empty($first_name) or empty($last_name) or empty($email) or empty($password)
                or empty($image)) {
                $error = "* fields are Required ";

            } else {
                $update_query = "UPDATE `user` SET `first_name` = '$first_name', `last_name` = '$last_name',
                  `email` = '$email', `password` = '$password', `gender` = '$gender', `image` = '$image' WHERE `user` . `id` = '".$_SESSION['user_id']."'";

                if (mysqli_query($con, $update_query)) {
                    $msg = "User Has Been Updated";
                    move_uploaded_file($image_tmp, "images/$image");
                    $image_check = "SELECT * FROM `user` ORDER BY id DESC LIMIT 1";
                    $image_run = mysqli_query($con, $image_check);
                    $image_row = mysqli_fetch_array($image_run);
                    $image = $image_row['image'];

                } else {
                    $error = "User Has Not Been Updated";
                }

            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <lable for="first-name">First Name:</lable>
                <?php
                if (isset($error)) {
                    echo "<span class='float-right' style='color: red;'>$error</span>";
                } else if (isset($msg)) {
                    echo "<span class='float-right' style='color: green;'>$msg</span>";
                }
                ?>
                <input type="" id="first-name" name="first_name" class="form-control"
                       placeholder="First Name" value="<?= $first_name; ?>">
            </div>
            <div class="form-group">
                <lable for="last-name">Last Name:</lable>
                <input type="" id="last-name" name="last_name" class="form-control"
                       placeholder="Last Name" value="<?= $last_name; ?>">
            </div>
            <div class="form-group">
                <lable for="email">Email:</lable>
                <input type="email" id="email" name="email" class="form-control"
                       placeholder="Email" value="<?= $email ?>">
            </div>
            <div class="form-group">
                <lable for="password">Password:</lable>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="Password">
            </div>
            <div class="form-group">
                <lable for="role">Gender:</lable>
                <select name="gender" id="gender" class="form-control">
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="form-group">
                <lable for="image">Profile Picture:</lable>
                <input type="file" id="image" name="image" value="<?= $image?>">
            </div>
            <input type="submit" name="submit" value="Update User" class="btn btn-primary">
        </form>
    </div>
    <div class="col-md-4">
        <?php
        if (isset($image)) {
            echo "<img src='images/$image' class='rounded-circle' alt='' width='250px' height='250px' style='margin-left: 20%; margin-top: 20%'>";
        }
        ?>
    </div>
</div>

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>