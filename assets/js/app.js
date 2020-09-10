var base_url = 'http://localhost/entertainer/';
$(document).ready(function () {

    /**
     * Get Post Feed
     */

    getPostFeedListFunc();

    $('#add-post-feed-form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: 'http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED',
            type: 'POST',
            data: $('#add-post-feed-form').serialize(),
            dataType: 'JSON',
            beforeSend: function () {
                $('#add-post-feed-form-submit-btn').val('Processing...');
            },
            success: function (response) {
                $('#add-post-feed-form-submit-btn').val('Post');
                if (response.statusCode == 200) {
                    $('#add-post-feed-form')[0].reset();
                    $('.feed-create-post-description-area').fadeOut();
                    $('.alert-message')
                        .removeClass('alert-danger')
                        .addClass('alert-success')
                        .text(response.message).fadeIn()
                        .delay(10000).fadeOut();
                    getPostFeedListFunc();
                    // MyFunc();
                } else {
                    $('.alert-message')
                        .removeClass('alert-success')
                        .addClass('alert-danger')
                        .text(response.message).fadeIn()
                        .delay(10000).fadeOut();
                }


                // $('#change-password-btn').val('SAVE PASSWORD');
            }
        });

        // function MyFunc() {

        $.ajax({
            url: 'http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED_DATA',
            type: 'POST',
            data: {
                'post_id': 'postid',
                'likes': 'likes',
            },
            success: function (responce) {
                // MyFunc();
            }

        });
        // }
    });


    $('.feed-feeling-btn').click(function () {
        $('.feed-create-post-description-area').slideDown(500);
    })

    $('.feed-close').click(function () {
        $('.feed-create-post-description-area').slideUp(500);
    })


    /*$('#change-password-form').submit(function (event) {
     event.preventDefault();
     $.ajax({
     url: $('#change-password-form').attr('action'),
     type: 'POST',
     data: $('#change-password-form').serialize(),
     dataType: 'JSON',
     beforeSend: function () {
     $('#change-password-btn').val('PROCESSING...');
     },
     success: function (response) {
     $('#change-password-btn').val('SAVE PASSWORD');
     $('#old_password-error,#new_password-error,#confirm_password-error').text('');
     if (response.status == false && response.statusCode == 422) {
     $.each(response.errors, function (key, val) {
     $('#' + key + '-error').text(val);
     });
     } else if (response.status == false && response.statusCode == 412) {
     $('#change-password-alert')
     .addClass('alert-website-color')
     .text(response.msg).fadeIn()
     .delay(3000).fadeOut();
     } else {
     $('#change-password-alert')
     .addClass('alert-website-color')
     .text(response.msg).fadeIn()
     .delay(2000).fadeOut();
     setTimeout(function () {
     window.location.replace(response.url);
     }, 3000);
     }
     }
     });
     });*/
});


function getPostFeedListFunc() {
    $.ajax({
        url: 'http://localhost/entertainer/Api/post.php?api=GET_POST_FEED_LIST',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            if (response.statusCode == 200) {
                var posts = '';
                $.each(response.items, function (index, item) {
                    var post_image = '';
                    if (item.post_image !== undefined && item.post_image !== null && item.post_image !== '') {
                        post_image += '<img src="' + base_url + item.post_image + '" alt="post image" width="100%" height="500px" class="m-0">';

                    }
                    var like_color = '8e8c8c';
                    if (item.like_id !== undefined && item.like_id !== null && item.like_id !== '') {
                        like_color = '1685FA';
                    }
                    posts += ' <div class="popular">\n' +
                        '                    <div class="row">\n' +
                        '                        <div class="col-xl-12 col-lg-12 col-md-12">\n' +
                        '                            <div class="row">\n' +
                        '                                <div class="col-xl-2 col-lg-2 col-md-2">\n' +
                        '                                    <a href="#" class="img">\n' +
                        '                                        <img src="img/post-image.jpg" alt="logo" class="rounded-circle"\n' +
                        '                                             width="40px"\n' +
                        '                                             height="40px">\n' +
                        '                                    </a>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-xl-8 col-lg-8 col-md-8 mt-2">\n' +
                        '                                    <a href="#"><h5>' + item.post_title + '</h5></a>\n' +
                        '                                    <p>' + item.post_created_at + ' <i class="fa fa-user-clock"></i></p>\n' +
                        '                                </div>\n' +
                        '                                <div class="col-xl-2 col-lg-2 col-md-2 mt-2 post-actions-btn">\n' +
                        '                                    <a href="#">\n' +
                        '                                        <i class="fa fa-ellipsis-h"></i>\n' +
                        '                                    </a>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="col-xl-12 col-lg-12 col-md-12 post-image">\n' +
                        '                            <a href="#">\n' +
                        post_image +
                        '                            </a>\n' +
                        '                            <p class="p" style="padding-left: 20px; padding-right:15px;">' + item.post_description + '</p>\n' +
                        '                        </div>\n' +
                        '                        <hr>\n' +
                        '                    </div>\n' +
                        '                    <div class="bottom-wrapper" id="inner">\n' +
                        '                        <div class="row">\n' +
                        '                            <div class="col-xl-6 col-lg-6 col-md-6 text-center">\n' +
                        '                                <a href="#">\n' +
                        '                                    <h6 style="color: #8e8c8c;"><i class="fa fa-thumbs-up mr-4"\n' +
                        '                                                                   style="color: #1685fa"></i>\n' +
                        '                                    </h6>\n' +
                        // '                                        <i class="fa fa-heart" style="color: #f33636"></i>\n' +
                        // '                                        <i class="fa fa-smile" style="color: #F1C40F"></i> 22</h6>\n' +
                        '                                </a>\n' +
                        '                            </div>\n' +
                        '                            <div class="col-xl-6 col-lg-6 col-md-6 text-center">\n' +
                        '                                <a href="#">\n' +
                        '                                    <h6 style="color: #8e8c8c;"> <i class="fa fa-comment-dots" style="color:#1685fa;"></i>  Comments</h6>\n' +
                        '                                </a>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                    <hr>\n' +
                        '                    <div class="inner-bottom">\n' +
                        '                        <div class="row">\n' +
                        '                            <div class="col-xl-4 col-lg-4 col-md-4 text-center">\n' +

                        '                                <a href="javascript:void(0)" class="feed-like" post_id="' + item.post_id + '">\n' +
                        '                                    <h6 style="color: ' + like_color + '" class="like"> <i class="fa fa-thumbs-up"\n' +
                        '                                                                  style="color: ;"></i>\n' +
                        '                                        Like</h6>\n' +
                        '                                </a>\n' +
                        '                            </div>\n' +
                        '                            <div class="col-xl-4 col-lg-4 col-md-4 text-center">\n' +
                        '                                <a href="#">\n' +
                        '                                    <h6 style="color: #8e8c8c;"><i class="fa fa-comment-dots"\n' +
                        '                                                                   style="color: rgba(116,111,111,0.98)"></i>\n' +
                        '                                        Comment\n' +
                        '                                    </h6>\n' +
                        '                                </a>\n' +
                        '                            </div>\n' +
                        '                            <div class="col-xl-4 col-lg-4 col-md-4 text-center">\n' +
                        '                                <a href="#">\n' +
                        '                                    <h6 style="color: #8e8c8c;"><i class="fa fa-share-square"\n' +
                        '                                                                   style="color: #1685fa;"></i> Share\n' +
                        '                                    </h6>\n' +
                        '                                </a>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                    <hr>\n' +
                        '                    <div class="comments">\n' +
                        '                        <div class="row">\n' +
                        '                            <div class="col-xl-2 col-lg-2 col-md-2 mb-2">\n' +
                        '                                <a href="#">\n' +
                        '                                    <img src="img/logo.jpg" class="rounded-circle" width="50%" alt="profile">\n' +
                        '                                </a>\n' +
                        '                            </div>\n' +
                        '                            <div class="col-xl-10 col-lg-10 col-md-10 ">\n' +
                        '                                <div class="input-group pr-2 pl-2">\n' +
                        '                                    <input type="text" class="form-control" name="search-title"\n' +
                        '                                           placeholder="Write a comment...">\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                </div>';
                });

                $('.get-post-feed-list-wrapper').html(posts);
            } else {
                alert('Error');
            }
        }
    });
};


getPostFeedListFunc();

$(function () {
    $('#feed-add-post-image').change(function () {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.feed-mode-image-display').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

});


getPostFeedListFunc();

$("#feed-add-post-image").change(function () {
    var formData = new FormData();
    formData.append('file', $('#feed-add-post-image')[0].files[0]);

    $("#image-post-btn").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED_IMAGE", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            beforeSend: function () {
                $('#image-post-btn').val('Processing...');
            },
            success: function (response)   // A function to be called if request succeeds
            {
                var res = JSON.parse(response);


                $('#image-post-btn').val('post-image');
                if (res.statusCode == 200) {
                    $("#exampleModalCenter").modal('hide');
                    $('.modal-body').removeData();
                    getPostFeedListFunc();
                    $('#add-post-feed-form')[0].reset();
                    $('.alert-message')
                        .removeClass('alert-danger')
                        .addClass('alert-success')
                        .text(res.message).fadeIn()
                        .delay(10000).fadeOut();
                    getPostFeedListFunc();
                    //MyFunc();
                } else {
                    $('.alert-message')
                        .removeClass('alert-success')
                        .addClass('alert-danger')
                        .text(res.message).fadeIn()
                        .delay(10000).fadeOut();
                }
            }
        });

        $.ajax({
            url: 'http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED_DATA',
            type: 'POST',
            data: {
                'post_id': 'postid',
                'likes': 'likes',
            },
            success: function (responce) {
                // MyFunc();
            }

        });

    })
});


$(document).on('click', '.feed-like', function () {

    var userid = $('#user_id').attr('user_id');
    var postid = $(this).attr('post_id');
    //var likes = $(this).attr('likes');

    if (userid != "" && postid != "") {
        //alert(userid + postid);

        $.ajax({
            url: 'http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED_LIKES',
            type: 'POST',
            data: {
                'user_id': userid,
                'post_id': postid,
            },
            dataType: 'JSON',
            success: function (response) {
                // console.log(response)
                if (response.statusCode == 200) {
                    //getPostFeedListFunc();
                    $(".like").css("color", "#1685FA");
                    //$post.parent().find('span.likes_count').text(response + " like");
                    //$post.addClass('hide');
                    //$post.siblings().removeClass('hide');
                }
            }
        });

        $(".feed-like").click(function (response) {
            if (response.statusCode == 200) {

                $(".feed-like").css("color", "#1685FA");
            } else {
                alert('You Already Liked the Post')
            }
        });

    }

});

function getPeopleListFunc() {

    $.ajax({
        url: 'http://localhost/entertainer/Api/post.php?api=ADD_GET_LOGED_IN_PEOPLE',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            if (response.statusCode == 200) {
                var peoples = '';
                $.each(response.items, function (index, item) {
                    // console.log(response);
                    peoples += '<div class="row profile">\n' +
                        '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">\n' +
                        '<a href="user_profile.php?id=' + item.id + ' "><img src="images/' + item.image + '" alt="profile" class="rounded-circle" width="40px" height="40px"></a>\n' +
                        '</div>\n' +
                        '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-3 inner-p" id="peoples">\n' +
                        '<a href="user_profile.php?id=' + item.id + '" style="color: #3e3e3e; text-decoration: none">\n' +
                        // item.first_name
                        ' <h6>' + item.first_name + ' ' + item.last_name + '</h6>\n' +
                        '</a>\n' +
                        '</div>\n' +
                        '</div>';

                });

                $('.add_get_people_list').html(peoples);
            } else {
                alert('People Not Found');
            }
        }

    });
}


getPostFeedListFunc();
getPeopleListFunc();


getPeopleListFunc();
$(function () {
    $('#edit-profile').change(function () {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.rounded-circle').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

});

/*$(document).on('click', '#edit-user-profile', function () {

    var image = $('#edit-user-profile').val();
    var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if(!img_ex.exec(image)){
        $('#edit-user-profile').val('');
        return false;
    }else{

    }

    $.ajax({
        url: 'http://localhost/entertainer/Api/post.php?api=EDIT_LOGED_IN_USER_PROFILE_DATA',
        type: 'GET',
        data:  new FormData(this),
        beforeSend: function(){$(".user-profile").show();},
        contentType: false,
        processData:false,
        success: function(data){
            console.log(response);
        }
    })

});*/

// $(document).on('click', '#edit-user-profile', function (event) {
//     e.preventDefault();
//     $.ajax({
//         url: "http://localhost/entertainer/Api/post.php?api=EDIT_LOGED_IN_USER_PROFILE_DATA",
//         type: "GET",
//         data:$(this).serialize(),
//         beforeSend: function () {
//             $(".user-profile").show();
//         },
//         cache:false
//
//     });
// });

/*$(document).on('click', '#edit-user-profile', function (event) {
    // alert('zcsdcsdc');
    event.preventDefault();

    var formData = new FormData();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/entertainer/Api/post.php?api=EDIT_LOGED_IN_USER_PROFILE_DATA',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.statusCode == 200) {
                alert('Successful');
            }

        }
    });
});*/

/*function editlogedinuserdata() {
    $.ajax({
        url: 'http://localhost/entertainer/Api/post.php?api=EDIT_LOGED_IN_USER_PROFILE_DATA',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            if (response.statusCode == 200) {

                var user_data = '';


                $.each(response.items, function (index, item) {

                    console.log(response);
                    user_data += '<div class="row">\n' +
                        '<div class="col-md-3">\n' +
                        '<a href="javascript:void(0)"><img src="' + item.image + '" alt="" class="rounded-circle"\n' +
                        'style="width: 40px; height: 40px; margin-left: 10px; margin-top: 10px">\n' +
                        '</a>\n' +

                        '   </div>\n' +
                        ' <div class="col-md-9">\n' +
                        '<h5 class="ml-3 mt-2">' + item.first_name + '</h5>\n' +
                        '</div>\n' +
                        '</div>';
                         $('.user_profile_data').html(user_data);
                });
            } else {
                alert('User Data Not Found');
            }
        }

    });
}

getPostFeedListFunc();
getPeopleListFunc();
editlogedinuserdata();*/


$(document).on('click', '.send-request', function () {
    // alert('success data');
    var userid = $(this).attr('data-uid');

    if (userid != "") {
    // alert(userid);

    $.ajax({
        url: 'http://localhost/entertainer/Api/post.php?api=ADD_GET_FRIEND_REQUEST&user_id=' + userid,
        type: 'GET',
        data: {
            'data-uid': userid,
        },
        dataType: 'JSON',
        success: function (response) {
            console.log(response);
            if (response.statusCode == 200) {
                // alert(response);
            }
        },
    });
    }
});