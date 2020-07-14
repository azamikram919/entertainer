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
            $response['status'] = 'Error';
            $response['message'] = 'Title is required.';
            $response['statusCode'] = 422;

        } else if (empty($_POST['description'])) {
            $response['status'] = 'Error';
            $response['message'] = 'Description is required.';
            $response['statusCode'] = 422;

        } /*else if (empty($_POST['image'])) {
            $response['status'] = 'Error';
            $response['message'] = 'image is required.';
            $response['statusCode'] = 422;
        }*/ else {
            $user_id = $_SESSION['user_id'];
            $title = mysqli_real_escape_string($con, $_POST['title']);
            $description = mysqli_real_escape_string($con, $_POST['description']);

            $insert_query = "INSERT INTO `post`(`title`, `description`,  `user_id`)
                             VALUES ('$title',  '$description',  '$user_id')";
            if ($run = mysqli_query($con, $insert_query)) {
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
        $query = "SELECT * FROM `post` ORDER BY id DESC LIMIT 10";
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




} else if (isset($_GET['api']) == 'ADD_POST_FEED_IMAGE') {
    $response = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_FILES['file']['name'])){
            $response['name'] = 'Error';
            $response['message'] = 'Image is Required';
            $response['statusCode'] = 422;
        }else {

            move_uploaded_file($_FILES["file"]["tmp_name"],
                "../images/" . $_FILES['file']['name']);

            $title = mysqli_real_escape_string($con, $_POST['title']);
            $name = $_FILES['file']['name'];
            $user_id = $_SESSION['user_id'];


            $query = "INSERT INTO `post`(`title`, `image`, `user_id`) VALUES ('$title', '$name', '$user_id')";
            if ($run = mysqli_query($con, $query)){
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
    exit();
}

?>