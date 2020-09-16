<?php
session_start();
require_once 'inc/env.php';
require_once 'inc/conn.php';

if (!isset($_SESSION['user_id'])) {
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
<?php require_once 'inc/navbar.php'; ?>
<?php
if (isset($_GET['id'])) {
$user_id = $_GET['id'];
$edit_query = "SELECT * FROM `user` WHERE id = '" . $user_id . "'";
$run = mysqli_query($con, $edit_query);
if (mysqli_num_rows($run) > 0) {
$item = mysqli_fetch_row($run);
?>
<div class="container-fluid">
    <div class="row" style="background: #fff">
        <div class="col-xl-1 col-lg-1 col-md-1"></div>
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="other-user-profile-page-center-box-wrapper">
                <div class="cover-photo mt-2 other-user-profile-page-cover-box">
                    <img src="images/<?= $image ?>" class="rounded-circle other-user-profile-page-profile-photo"
                         alt=""
                         data-holder-rendered="true">
                </div>
                <br><br>
                <h1 class="text-center mt-4">John Do</h1>
                <div class="row">
                    <div class="col-xl-1 col-lg-1 col-md-1"></div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="other-user-profile-posts-data">
                            <hr class="hr">
                            <div class="second-navbar">
                                <nav class="navbar navbar-expand-md navbar-light">
                                    <a href="#" class="navbar-brand timeline">Timeline</a>
                                    <button type="button" class="navbar-toggler" data-toggle="collapse"
                                            data-target="#navbarCollapse">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse justify-content-between"
                                         id="navbarCollapse">
                                        <div class="navbar-nav">
                                            <a href="#" class="nav-item nav-link about">About</a>
                                            <a href="#" class="nav-item nav-link photos">Photos</a>
                                            <a href="#" class="nav-item nav-link video">Videos</a>
                                            <div class="nav-item dropdown nav-drop">
                                                <a href="#" class="nav-link dropdown-toggle"
                                                   data-toggle="dropdown">More</a>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item">Check-Ins</a>
                                                    <a href="#" class="dropdown-item">Sports</a>
                                                    <a href="#" class="dropdown-item">Music</a>
                                                    <a href="#" class="dropdown-item">Movies</a>
                                                    <a href="#" class="dropdown-item">TV Shows</a>
                                                    <a href="#" class="dropdown-item">Books</a>
                                                    <a href="#" class="dropdown-item">Apps and Games</a>
                                                    <a href="#" class="dropdown-item">Likes</a>
                                                    <a href="#" class="dropdown-item">Events</a>
                                                    <a href="#" class="dropdown-item">Reviews</a>
                                                    <a href="#" class="dropdown-item">Notes</a>
                                                    <a href="#" class="dropdown-item">Instagram</a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="menu-bar">
                                            <form class="form-inline ml-auto">
                                                <!--<button type="sub" class="btn btn-md"><i
                                                            class="fab fa-facebook-messenger"></i> Message
                                                </button>
                                                <button type="sub" class="btn btn-sm phone"><i
                                                            class="fa fa-phone"></i>
                                                </button>
                                                <button type="sub" class="btn btn-sm user"><i
                                                            class="fa fa-user"></i>
                                                </button>
                                                <button type="sub" class="btn btn-sm dots"><i
                                                            class="fa fa-ellipsis-h"></i>
                                                </button>-->
                                                <div class="navbar-nav ml-2">
                                                    <div class="nav-item dropdown drop">
                                                        <a href="#" class="nav-link"
                                                           data-toggle="dropdown"><i
                                                                    class="fab fa-facebook-messenger"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a href="#" class="dropdown-item">Audio Call</a>
                                                            <a href="#" class="dropdown-item">Video Call</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-nav ml-2">
                                                    <div class="nav-item dropdown drop-2">
                                                        <a href="#" class="nav-link"
                                                           data-toggle="dropdown"><i class="fa fa-phone"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a href="#" class="dropdown-item">Audio Call</a>
                                                            <a href="#" class="dropdown-item">Video Call</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-nav ml-2">
                                                    <div class="nav-item dropdown drop-2">
                                                        <a href="javascript:void(0);" class="nav-link"
                                                           data-toggle="dropdown"><i class="fa fa-user-plus"></i></a>
                                                        <div class="dropdown-menu">
                                                            <?php
                                                            if (isset($_GET['id']) && !empty($_GET['id'])) {
                                                                $other_user_id = $_GET['id'];
                                                                $other_sender_id = $_SESSION['user_id'];
                                                                $other_receiver_id = $_GET['id'];
                                                                ?>
                                                                <a href="javascript:void(0);"
                                                                   data-uid="<?= $other_user_id; ?>"
                                                                   data-sid="<?= $other_sender_id; ?>"
                                                                   data-rid="<?= $other_receiver_id; ?>"
                                                                   class="dropdown-item send-request">
                                                                    <i class="fas fa-user"></i> Send Friend Request
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                            <a href="#" class="dropdown-item"><i class="far fa-star"></i> See Friends </a>
                                                            <a href="#" class="dropdown-item"><i class="fas fa-user-times"></i> Unfriend</a>
                                                            <a href="#" class="dropdown-item"><i class="fas fa-ban"></i> Block</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-nav ml-2">
                                                    <div class="nav-item dropdown drop-3">
                                                        <a href="#" class="nav-link"
                                                           data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a href="#" class="dropdown-item"><i class="fas fa-search"></i> Search Profile</a>
                                                            <a href="#" class="dropdown-item"><i class="fas fa-user-friends"></i> See Friendship</a>
                                                            <a href="#" class="dropdown-item"><i class="fas fa-exclamation"></i> Find Support Profile</a>
                                                            <a href="#" class="dropdown-item"><i class="fas fa-ban"></i> Block</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="row">
                <div class="col-xl-4 intro-box">
                    <h3>Intro</h3>
                    <hr>
                    <span><i class="fa fa-graduation-cap"></i> Studied at <a
                                href="#">G.C burewala </a></span>
                </div>
                <!--<div class="col-xl-5 user-posts">
                    <div class="row">
                        <form action="">
                            <div class="col-xl-3 image">
                                <img src="img/logo.jpg" alt="" class="rounded-circle" width="50px" height="50px">
                            </div>
                            <div class="col-xl-7">
                                <input type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>-->
                <div class="col-xl-8">
                    <div class="post">
                        <form id="add-post-feed-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2 col-md-2">
                                    <a href="#">
                                        <img src="img/logo.jpg" class="rounded-circle" alt="logo">
                                    </a>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-8">
                                    <div class="input-group mt-4 pr-2 pl-2">

                                        <input type="text" name="title" id="feed-title-post"
                                               class="form-control"
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
                                            <h6><i class="fa fa-video" style="color: #fd3232;"></i> Live
                                            </h6>
                                        </a>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                                        <h6 class="feed-photo-btn">
                                            <div class="">
                                                <i class="far fa-file-image"
                                                   style="color: #68de48; cursor: pointer;"
                                                   data-toggle="modal"
                                                   data-target="#exampleModalCenter">
                                                    Photo
                                                </i>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalCenterTitle"
                                                     aria-hidden="true">

                                                    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                    <div class="modal-dialog modal-dialog-centered"
                                                         role="document">

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalLongTitle">Post
                                                                    Image</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"
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

                                                                        <input id="feed-add-post-image"
                                                                               type="file"
                                                                               name="file"
                                                                               style="display: none;"/>
                                                                    </label>
                                                                </div>

                                                                <div class="image-upload">
                                                                    <label for="feed-add-post-image"
                                                                    <i class="fa fa-file-image"
                                                                       style="cursor:pointer; font-size: 25px; color: #f1b0b7;"></i>
                                                                    <input id="feed-add-post-image"
                                                                           type="file"
                                                                           name="file"
                                                                           style="display: none;"/>

                                                                    </label>
                                                                </div>

                                                            </div>

                                                            <button type="button" name=""
                                                                    id="image-post-btn"
                                                                    class="btn btn-primary"
                                                                    value="image-post">Post
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
                                        <div class="card card-body feed-create-post-description-area"
                                             style="display: none">
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
                                                                                <textarea name="description" id=""
                                                                                          cols="60"
                                                                                          rows="5"
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="row">
                <div class="col-xl-4 intro-box-2">
                    <div class="row">
                        <div class="col-xl-6">
                            <a href="#">
                                <h3>Photos</h3>
                            </a>
                        </div>
                        <div class="col-xl-6 see">
                            <a href="#">
                                <h3>See All</h3>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                            <div class="user-photos">
                                <img src="img/logo.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="get-post-feed-list-wrapper">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2"></div>
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 see-friends">
                    <div class="row">
                        <div class="col-xl-6">
                            <a href="#">
                                <h3>Friends</h3>
                            </a>
                        </div>
                        <div class="col-xl-6 a">
                            <a href="#">
                                <h3>See All</h3>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                            <div class="see-other-user-friends">
                                <img src="img/post.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php
} else {
    ?>
    <br><br><br>
    <h1 class="text-center">Profile Not Found.</h1>
    <?php
}
}
?>


<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>