<?php
session_start();
require_once 'inc/env.php';
require_once 'inc/conn.php';
if (empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['user_id'])) {
    header('Location: login.php');
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
    <title>Facebook</title>
</head>
<body>

<?php require_once 'inc/navbar.php';

/*$record_per_page = 8;
$page = '';
$output = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
$page_query = "SELECT * FROM post ORDER BY id DESC";
$page_result = mysqli_query($con, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);*/

?>


<section>
    <div class="container-fluid">
        <div class="row ">
            <?php require_once 'inc/left_sidebar.php' ?>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="row p-2 text-white justify-content-center story">
                    <div class="p-2 col-md-3 col-sm-6">
                        <div class="st"
                             style="background-image: url('img/post.jpg'); background-size: cover; background-repeat: no-repeat; min-height: 200px;">
                            <a href="#"><i class="fa fa-plus"></i></a> <span>John</span>
                        </div>
                    </div>
                    <div class="p-2 col-md-3 col-sm-6">
                        <div class="st"
                             style="background-image: url('img/post-image.jpg'); background-size: cover; background-repeat: no-repeat; min-height: 200px;">
                            <span>Xaim</span>
                        </div>
                    </div>
                    <div class="p-2 col-md-3 col-sm-6">
                        <div class="st"
                             style="background-image: url('img/post.jpg'); background-size: cover;background-repeat: no-repeat; min-height: 200px;">
                            <span>Adil</span>
                        </div>
                    </div>
                    <div class="p-2 col-md-3 col-sm-6">
                        <div class="st"
                             style="background-image: url('img/post-image.jpg'); background-size: cover;background-repeat: no-repeat; min-height: 200px;">
                            <span>Umar</span>
                        </div>
                    </div>
                </div>

                <div class="alert alert-message" style="display: none"></div>
                <div class="post">
                    <form id="add-post-feed-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <a href="#">
                                    <img src="img/logo.jpg" class="rounded-circle" alt="logo">
                                </a>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <div class="input-group mt-4 pr-2 pl-2">

                                    <input type="text" name="title" id="feed-title-post" class="form-control"
                                           value="<?php if (isset($title)) {
                                               echo $title;
                                           } ?>" placeholder="Your Title..." style="width: 32rem">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="bottom">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                                    <a href="#">
                                        <h6><i class="fa fa-video" style="color: #fd3232;"></i> Live</h6>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                                    <h6 class="feed-photo-btn">
                                        <div class="">
                                            <i class="far fa-file-image"
                                               style="color: #68de48; cursor: pointer;" data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                                Photo
                                            </i>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle"
                                                 aria-hidden="true">

                                                <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                <div class="modal-dialog modal-dialog-centered" role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Post
                                                                Image</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="" class="feed-mode-image-display"
                                                                 alt="">
                                                        </div><!--main image-->
                                                        <div class="modal-footer">
                                                            <!--<h3>Add To Your Post</h3>-->
                                                            <div class="image-upload">
                                                                <label for="feed-add-post-image">
                                                                    <img src="img/add-post.png"
                                                                         style="width: 70%; margin-right: 20%; cursor:pointer; margin-top: -0;"
                                                                         alt="add-image">

                                                                    <input id="feed-add-post-image" type="file"
                                                                           name="file"
                                                                           style="display: none;"/>
                                                                </label>
                                                            </div>

                                                            <div class="image-upload">
                                                                <label for="feed-add-post-image"
                                                                <i class="fa fa-file-image"
                                                                   style="cursor:pointer; font-size: 25px; color: #f1b0b7;"></i>
                                                                <input id="feed-add-post-image" type="file"
                                                                       name="file"
                                                                       style="display: none;"/>

                                                                </label>
                                                            </div>

                                                        </div>

                                                        <button type="button" name="" id="image-post-btn"
                                                                class="btn btn-primary" value="image-post">Post
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </h6>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                                    <h6 style="cursor: pointer;" class="feed-feeling-btn">
                                        <i class="far fa-laugh" style="color: #F1C40F;"></i> Feeling
                                    </h6>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                                    <div class="card card-body feed-create-post-description-area" style="display: none">
                                        <div class="header">
                                            <p class="float-left" style="margin: -10px;">
                                                Create Post
                                            </p>
                                            <i class="feed-close fa fa-times float-right"
                                               style="margin-top: -10px; cursor:pointer; color: #C0C0C0">
                                            </i>
                                        </div>
                                        <hr>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <textarea name="description" id="" cols="72" rows="5"
                                                              placeholder="Write Your Post"
                                                              style="border: 1px solid #E5E5E5; border-radius: 5px">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 btn">
                                                    <input type="submit" name="post" value="Post"
                                                           id="add-post-feed-form-submit-btn"
                                                           class="btn btn-primary form-control"
                                                           style="margin-top: 10px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!--close post area-->

                <span style="display: none;" id="user_id" user_id="<?php echo $_SESSION['user_id'] ?>"></span>
                <div class="get-post-feed-list-wrapper">

                </div>

            </div><!--close md-6-->
            <?php require_once 'inc/right_sidebar.php' ?>
        </div>
    </div>
</section>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>
<!--<script src="assets/bootstrap-4.0.0/js/popper.min.js"></script>-->
</body>
</html>