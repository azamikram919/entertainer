<?php
session_start();
require_once 'inc/env.php';
require_once 'inc/conn.php';
if (isset($_POST['login'])) {

    if (!empty($_POST['email']) && ($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

//        if
//        (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)
//        ) {
//            $emailErr = "You Entered An Invalid Email Format";
//
//        } elseif (strlen($_POST["password"]) <= 8) {
//            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
//        }

        $query = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
        $run = mysqli_query($con, $query);
        if ($row = mysqli_fetch_array($run)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            header('Location: index.php');


        } else {
            $error = "Wrong email or Password";
        }
//    } else {
//        echo "Not Success";
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
    <link rel="icon" href="img/title.png">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Facebook Login</title>
</head>
<body>
<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <h1 style="color: #ffbaee">facebook</h1>
                <h4>Recent logins</h4>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8s box">
                <form action="login.php" method="post">
                    <input type="text" name="email" placeholder="Email" class="form-control">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <input type="submit" name="login" value="Log In" class="form-control">
                    <a class="small" href="#" style="text-decoration: none">Forget Password</a>
                    <?php
                    if (isset($error)) {
                        echo "<center style='color: #ff0000; font-size: 11px; margin-top: 10px;'>$error</center>";
                    }
                    ?>
                    <hr>
                </form>
                <div class="button">
                    <a href="signup.php">
                        <input type="submit" name="" value="Create New Account">
                    </a>
                </div>
                <!--<div class="text-center small" style="margin-top: 2rem; margin-bottom: -15px">Already have an account?<a
                            href="signup.php">Signup Here</a>
                </div>-->
            </div>
        </div>
    </div>
</div>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<!--<script src="assets/bootstrap-4.0.0/js/popper.min.js"></script>-->
</body>
</html>