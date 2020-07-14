<?php
require_once 'inc/env.php';
require_once 'inc/conn.php';
if (isset($_POST['signup'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
    $email_trim = preg_replace('/\s+/', '', $email);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $birth_date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    //echo $first_name . $last_name . $email . $password . $birth_date . $gender;
    //exit();
    if (empty($first_name) or empty($last_name) or empty($email) or empty($password)) {
        $error = "(*) fields are Required";
    } elseif ($email != $email_trim) {
        $error = "Don't Use Space in Username";
    } else {


        $query = "INSERT INTO `user`(`email`, `password`, `first_name`, `last_name`, `birth_date`, `gender`) 
                VALUES('$email', '$password','$first_name', '$last_name', '$birth_date', '$gender')";
        if (mysqli_query($con, $query)) {
            $msg = "User Has Been Added";
            echo "";
            header('location: login.php');
            $first_name = "";
            $last_name = "";
            $email = "";
            $password = "";
        } else {
            $error = "User Has Not Been Added";
        }
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
    <link rel="stylesheet" href="assets/css/styling.css">
    <title>Facebook Signup</title>
</head>
<body>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 signup">
        <form method="post">
            <h2>Sign Up</h2>
            <h4 style="font-size: 15px">it's quick and easy</h4>
            <?php
            if (isset($error)) {
                echo "<h6 style='color: red; margin-bottom: -10px'>$error</h6>";
            } else if (isset($msg)) {
                echo "<h6 style='color: green; margin-bottom: -10px'>$msg</h6>";
            }
            ?>
            <input type="text" name="first_name" placeholder="First name" value="<?php if (isset($first_name)) {
                echo $first_name;
            } ?>">
            <input type="text" name="last_name" placeholder="Last name" value="<?php if (isset($last_name)) {
                echo $last_name;
            } ?>">
            <input type="email" name="email" placeholder="Email address" class="form-control" style="margin-top: -3px"
                   value="<?php if (isset($email)) {
                       echo $email;
                   } ?>">
            <input type="password" name="password" placeholder="Password" class="form-control"
                   value="<?php if (isset($password)) ?>">

            <h5 class="h5">Birthday <a href="#" style="color: #0f0f0f"><i class="fa fa-question-circle"></i></a>
            </h5>
            <select name="day" id="day">
                <option value=""> Day</option>
                <option value="1"> 1</option>
                <option value="2"> 2</option>
                <option value="3"> 3</option>
                <option value="4"> 4</option>
                <option value="5"> 5</option>
                <option value="6"> 6</option>
                <option value="7"> 7</option>
                <option value="8"> 8</option>
                <option value="9"> 9</option>
                <option value="10"> 10</option>
                <option value="11"> 11</option>
                <option value="12"> 12</option>
                <option value="13"> 13</option>
                <option value="14"> 14</option>
                <option value="15"> 15</option>
                <option value="16"> 16</option>
                <option value="17"> 17</option>
                <option value="18"> 18</option>
                <option value="19"> 19</option>
                <option value="10"> 20</option>
                <option value="21"> 21</option>
                <option value="22"> 22</option>
                <option value="23"> 23</option>
                <option value="24"> 24</option>
                <option value="25"> 25</option>
                <option value="26"> 26</option>
                <option value="27"> 27</option>
                <option value="28"> 28</option>
                <option value="29"> 29</option>
                <option value="30"> 30</option>
                <option value="31"> 31</option>
            </select>
            <select name="month" id="month">
                <option value=""> Month</option>
                <option value="01"> January</option>
                <option value="02"> February</option>
                <option value="03"> March</option>
                <option value="04"> April</option>
                <option value="05"> May</option>
                <option value="06"> June</option>
                <option value="07"> July</option>
                <option value="08"> August</option>
                <option value="09"> September</option>
                <option value="10"> October</option>
                <option value="11"> November</option>
                <option value="12"> December</option>
            </select>
            <select name="year" id="year">
                <option value=""> Year</option>
                <option value="1995"> 1995</option>
                <option value="1996"> 1996</option>
                <option value="1997"> 1997</option>
                <option value="1998"> 1998</option>
                <option value="1998"> 1999</option>
                <option value="2000"> 2000</option>
                <option value="2001"> 2001</option>
                <option value="2002"> 2002</option>
                <option value="2003"> 2003</option>
                <option value="2003"> 2003</option>
                <option value="2004"> 2004</option>
                <option value="2005"> 2005</option>
                <option value="2005"> 2005</option>
                <option value="2006"> 2006</option>
                <option value="2007"> 2007</option>
                <option value="2008"> 2008</option>
                <option value="2009"> 2009</option>
                <option value="2010"> 2010</option>
                <option value="2011"> 2011</option>
                <option value="2012"> 2012</option>
                <option value="2013"> 2013</option>
                <option value="2014"> 2014</option>
                <option value="2015"> 2015</option>
                <option value="2016"> 2016</option>
                <option value="2017"> 2017</option>
                <option value="20118"> 2018</option>
                <option value="2019"> 2019</option>
                <option value="2020"> 2020</option>
            </select><br><br>
            <h4 class="h4">Gender <a href="#" style="color: #0f0f0f"><i class="fa fa-question-circle"></i></a></h4>
            <button class="btn1">
                Female
                <input type="radio" name="gender" value="F">
            </button>
            <button class="btn1">
                Male
                <input type="radio" name="gender" value="M">
            </button>
            <button class="btn1">
                Other
                <input type="radio" name="gender" value="O">
            </button>
            <p>
                By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a> and <a
                        href="#">Cookie Policy</a>. You may receive SMS
                notifications from us and can opt out at any time.
            </p>
            <input type="submit" name="signup" value="Sign Up">
        </form>
        <div class="text-center small" style="padding-top: 22px; margin-left: 12rem;">Already have an account?<a
                    href="login.php"">Login Here</a>
        </div>
    </div>
</div>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<!--<script src="assets/bootstrap-4.0.0/js/popper.min.js"></script>-->
</body>
</html>