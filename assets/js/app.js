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
                    if (item.image !== undefined && item.image !== null && item.image !== '') {
                        post_image += '<img src="' + base_url + item.image + '" alt="post image" width="100%" class="m-0">';

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
                        '                                    <a href="#"><h5>' + item.title + '</h5></a>\n' +
                        '                                    <p>' + item.created_at + ' <i class="fa fa-user-clock"></i></p>\n' +
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
                        '                            <p class="p" style="padding: 30px">' + item.description + '</p>\n' +
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

                        '                                <a href="javascript:void(0)" class="feed-like" post_id="' + item.id + '">\n' +
                        '                                    <h6 style="color: #8e8c8c" class="like"> <i class="fa fa-thumbs-up"\n' +
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


/*$(document).ready(function() {
 load_data();

 function load_data(page) {
 $.ajax({
 url: "http://localhost/entertainer/index.php",
 type: "GET",
 data: {
 page: page
 },
 success: function(data) {
 $('').html();
 }
 })
 }
 $(document).on('click', '.pagination_link', function() {
 var page = $(this).attr("id");
 //alert(page);
 load_data(page);
 });
 });*/

/*$(document).on('click', '.feed-like', function () {
 //alert("Feed like Clicked!!");

 var $this = $(this);

 var userid = $this.data('user_id');
 var postid = $this.data('post_id');
 var likes = $this.data('likes');

 $.ajax({
 url: 'http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED_DATA',
 type: 'POST',
 data: {
 'user_id': userid,
 'post_id': postid,
 'likes': likes,
 },
 dataType: 'JSON',

 success: function (response) {
 getPostFeedListFunc();
 }
 })
 });*/

/*$(document).on('click', '.feed-like', function () {
 //alert("Feed like Clicked!!");

 var userid = $(this).attr('user_id');
 var postid = $(this).attr('post_id');
 var likes = $(this).attr('likes');

 if (userid != "" && postid != "" && likes != ""){
 $.ajax({
 url: 'http://localhost/entertainer/Api/post.php?api=ADD_POST_FEED_DATA',
 type: 'POST',
 data: {
 'user_id': userid,
 'post_id': postid,
 'likes': likes,
 },
 success: function (response) {
 getPostFeedListFunc();
 $(".feed-like").css("color", "blue");
 // $post.parent().find('span.likes_count').text(response + " like");
 // $post.addClass('hide');
 // $post.siblings().removeClass('hide');
 }
 })
 }
 });*/


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
                else {
                    // alert(response.message)
                }

            }
        });

        // $(".feed-like").click(function (event) {
        //     $('.like').css("color", "#1685FA");
        // });


    }

});