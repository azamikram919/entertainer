<?php
session_start();
require_once '../inc/env.php';
require_once '../inc/conn.php';

/**
 * Add new post API
 *  api name ADD_POST_FEED
 */
if (isset($_GET['api']) && $_GET['api'] == 'ADD_POST_FEED') {
    $response = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST['title'])) {
            $response['name'] = 'Error';
            $response['message'] = 'Title is required.';
            $response['statusCode'] = 422;

        } else if (empty($_POST['description'])) {
            $response['status'] = 'Error';
            $response['message'] = 'Description is required.';
            $response['statusCode'] = 422;

        } else {
            $user_id = $_SESSION['user_id'];
            $title = mysqli_real_escape_string($con, $_POST['title']);
            $description = mysqli_real_escape_string($con, $_POST['description']);


            $insert_query = "INSERT INTO `post`(`title`, `description`,  `user_id`)
                             VALUES ('$title',  '$description',  '$user_id')";

//            $run = mysqli_query("INSERT INTO `likes` (`user_id`, `post_id`) VALUE ('$user_id', '$last_id')");

//            $like_query = "INSERT INTO `likes`(`post_id`, `user_i  d`, `likes`)
//                            VALUE ('$last_id', '$user_id', '$likes')";

//            echo $like_query($run);
//            exit();

            if ($run = mysqli_query($con, $insert_query) === TRUE) {

                $last_id = mysqli_insert_id($con);
                /*$path = "images/$image";
                if (move_uploaded_file($image_tmp, $path)) {
                    copy($path, "$path");
                }*/
                $response['status'] = 'Success';
                $response['message'] = 'Post created.';
                $response['statusCode'] = 200;

            } else {
                $response['status'] = 'Error';
                $response['message'] = 'Failed to  create post.';
                $response['statusCode'] = 500;

            }
        }

    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;

    }
    echo json_encode($response);
    exit;
} /**
 * GET post feed home fee
 * API : GET_POST_FEED_LIST
 */
else if (isset($_GET['api']) && $_GET['api'] == 'GET_POST_FEED_LIST') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $response = $result = null;
//        $query = "SELECT * FROM `post` ORDER BY id DESC";
        $query = "SELECT * FROM `post` INNER JOIN `likes` ON post.id = likes.post_id ";
        $run = mysqli_query($con, $query);
        if (mysqli_num_rows($run) > 0) {

            while ($row = mysqli_fetch_assoc($run)) {
                $result[] = $row;
            }

            $response['status'] = 'Success';
            $response['items'] = $result;
            $response['statusCode'] = 200;

        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Not Found.';
            $response['statusCode'] = 404;
        }
    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }
    echo json_encode($response);
    exit;


} else if (isset($_GET['api']) && $_GET['api'] == 'ADD_POST_FEED_IMAGE') {

    $response = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_FILES['file']['name'])) {

            $response['name'] = 'Error';
            $response['message'] = 'Image is Required';
            $response['statusCode'] = 422;

        } else {

            move_uploaded_file($_FILES["file"]["tmp_name"],
                "../images/" . $_FILES['file']['name']);

            $name = 'images/' . $_FILES['file']['name'];
            $user_id = $_SESSION['user_id'];


            $query = "INSERT INTO `post`(`image`, `user_id`) VALUES ('$name', '$user_id')";

            if ($run = mysqli_query($con, $query)) {

                $last_id = mysqli_insert_id($con);
                $response['id'] = $last_id;
                $response['message'] = 'Post created.';
                $response['statusCode'] = 200;

            } else {
                $response['status'] = 'Error';
                $response['message'] = 'Failed to  create post.';
                $response['statusCode'] = 500;

            }
        }

    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }

    echo json_encode($response);
    exit();

} else if (isset($_GET['api']) && $_GET['api'] == 'ADD_POST_FEED_IMAGE_LIST') {
//    (isset($_GET['api']) == 'ADD_POST_FEED_IMAGE_LIST')
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $response = null;

        $query = "SELECT * FROM `post` ORDER BY id DESC";
        $run = mysqli_query($con, $query);

        if (mysqli_num_rows($run)) {

            while ($row = mysqli_fetch_assoc($run)) {
                $result[] = $row;
            }

            $response['status'] = 'Success';
            $response['items'] = $result;
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Not Found.';
            $response['statusCode'] = 404;
        }

    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }
    echo json_encode($response);
    exit();


}/* else if (isset($_GET['api']) && $_GET['api'] == 'ADD_POST_FEED_DATA') {

    $response = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_SESSION['user_id'])) {
            $response['name'] = 'Error';
            $response['message'] = 'user_id is Required';
            $response['statusCode'] = 422;

        } elseif (empty($_POST['post_id'])) {
            $response['name'] = 'Error';
            $response['message'] = 'post_id is Required';
            $response['statusCode'] = 422;

        } elseif (empty($_POST['likes'])) {
            $response['name'] = 'Error';
            $response['message'] = 'likes is Required';
            $response['statusCode'] = 422;

        } else {

            $user_id = $_SESSION['user_id'];
            $post_id = $_POST['post_id'];
            $likes = $_POST['likes'];


            $query = "INSERT INTO `likes` (`user_id`, `post_id`, `likes`)
                     VALUES ('$user_id', '$post_id', '$likes')";

//            $query = "INSERT INTO `likes` (`user_id`, `post_id`, `likes`) VALUES ('$user_id', '$post_id', '$likes')
//                      SELECT ID FROM `post` WHERE id = post_id ";

//            echo $query($run);
//            exit();

            if  ($run = mysqli_query($con, $query)) {
                $response['status'] = 'Success';
                $response['message'] = 'Save Record';
                $response['statusCode'] = 200;

            } else {
                $response['status'] = 'Error';
                $response['message'] = 'Record Failed.';
                $response['statusCode'] = 500;

            }
        }

    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }
    echo json_encode($response);
    exit();


}*/

else if (isset($_GET['api']) && $_GET['api'] == 'ADD_POST_FEED_LIKES') {
    $response = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST['post_id'])) {
            $response['name'] = 'Error';
            $response['message'] = 'Post_id is Required';
            $response['statusCode'] = 422;
        } else {

            $user_id = $_SESSION['user_id'];
            $post_id = $_POST['post_id'];

            //cehck exiting like if exist then already like other wise add new
            $check_existing = "SELECT * FROM likes WHERE user_id='" . $user_id . "' AND post_id='" . $post_id . "'";
            $check_existing_result = mysqli_query($con, $check_existing);

            if (mysqli_num_rows($check_existing_result) > 0) {
                $response['status'] = 'Success';
                $response['message'] = 'You already liked the post.';
                $response['statusCode'] = 200;
                echo json_encode($response);
                exit();
            }

            //add new like
            $query = "INSERT INTO `likes`(`user_id`, `post_id`) VALUES ('" . $user_id . "','" . $post_id . "')";

            //$query = "INSERT INTO `likes` VALUES('$user_id', '$post_id');
            // Query OK, 1 row affected (0.02 sec)";


            $run = mysqli_query($con, $query);
            if ($run) {
                $response['status'] = 'Success';
                $response['message'] = 'You liked the post';
                $response['statusCode'] = 200;

            } else {
                $response['status'] = 'Error';
                $response['message'] = 'Failed to  create post.';
                $response['statusCode'] = 500;

            }
        }

    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }
    echo json_encode($response);
    exit();

} /*else if (isset($_GET['api']) && $_GET['api'] == 'ADD_GET_POST_LIKES') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $response = null;

        $query = "SELECT * FROM `likes`";
        $run = mysqli_query($con, $query);

        if (mysqli_num_rows($run)) {

            while ($row = mysqli_fetch_assoc($run)) {
                $result[] = $row;
            }

            $response['status'] = 'Success';
            $response['items'] = $run;
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Not Found.';
            $response['statusCode'] = 404;
        }
    } else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }
    echo json_encode($response);
    exit();

}

/*else if(isset($_GET['api']) == 'ADD_POST_FEED_LIKES'){

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $response = 'null';

        if (isset($_POST['like'])) {
            $post_id = $_POST['post_id'];
            $result = mysqli_query($con, "SELECT * FROM likes WHERE id=$post_id");
            $row = mysqli_fetch_array($result);
            $n = $row['likes'];




            echo $n+1;
            exit();
        }

    }else {
        $response['status'] = 'Error';
        $response['message'] = 'Not Found.';
        $response['statusCode'] = 404;
    }
    echo json_encode($response);
    exit();

}*/

?>