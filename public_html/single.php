<?php
require_once("path.php");
require_once(SITE_ROOT . "/app/database/db.php");

$post = selectPostFromPostsWithUsersOnSingle('posts', 'users', 'topics', $_GET['post']);



?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_for_main_header.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_for_slider.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_content.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_footer.css" rel="stylesheet">
    <link href="assets/css/style_for_single_page/style_for_page.css" rel="stylesheet">


    <title>Fitlent blog</title>
</head>
<body>




<?php
include("app/include/header.php");
?>





<div class="container">
    <div class="container row">

        <div class="main-content col-12">
            <h2><?=$post['title']?></h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="assets/images/img_for_pages/posts/<?=$post['img']?>" alt="" class="img-thumbnail">
                </div>
                <div class="info">
                    <img src="assets/images/img_for_style/style_header/user.png" height="20" width="20"><?=$post['username']?></i>
                    <i><img src="assets/images/img_for_style/style_header/calendar.png" height="20" width="20"><?=$post['created_date']?></i>
                </div>
                <div class="single_post_text col-12">
                    <h3><?=$post['topics_title']?></h3>
                    <?=$post['content']?>
                </div>
            </div>

        </div>

    </div>
</div>



<?php
include("app/include/footer.php");
?>




<!--Подключение bootstrap-->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>