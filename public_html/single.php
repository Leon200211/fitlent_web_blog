<?php
require_once("path.php");
require_once(SITE_ROOT . "/app/database/db.php");

$post = selectOne('posts', ['id' => $_GET['post']]);
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

        <div class="main-content col-md-9 col-12">
            <h2><?=$post['title']?></h2>

            <div class="single_post row">
                <div class="img col-12">
                    <img src="assets/images/img_for_style/style_carousel/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="info">
                    <i><img src="assets/images/img_for_style/style_header/user.png" height="20" width="20">Имя автора</i>
                    <i><img src="assets/images/img_for_style/style_header/calendar.png" height="20" width="20">2022-22-12</i>
                </div>
                <div class="single_post_text col-12">
                    <h3>Заголовок 3 уровня</h3>
                    <?=$post['content']?>
                </div>
            </div>


        </div>




        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                </form>
            </div>

            <div class="section topics">
                <h3>Темы</h3>
                <ul>
                    <?php
                    $topics = SelectAll('topics');
                    foreach ($topics as $key => $topic):
                        ?>
                        <li><a href="#"><?=$topic['topics_title']?></a></li>
                    <?php endforeach; ?>
                </ul>
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