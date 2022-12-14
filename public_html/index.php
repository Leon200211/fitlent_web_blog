<?php
session_start();

require_once("path.php");
require_once('app/database/db.php');


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
$offset = $limit * ($page - 1);

$total_pages = ceil(countRow('posts') / $limit);

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


    <title>Fitlent blog</title>
</head>
<body>


<?php
include("app/include/header.php");
?>


<div class="container">
    <div>
        <h2 class="slider-title">Мои проекты</h2>
    </div>
    <?php
    $topTopics = selectTopTopics('Top topics');
    ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            <?php
            foreach ($topTopics as $key => $topTopic){
                if($key == 0){
                    ?>
                    <div class="carousel-item active">
                <?php
                }else{
                    ?>
                    <div class="carousel-item">
                <?php
                }
                ?>
                        <div class="carousel-item_img">
                            <a href="/">
                                <img src="<?=BASE_URL . 'assets/images/img_for_pages/posts/' . $topTopic['img']?>" class="d-block w-100" alt="...">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><a href="single.php?post=<?=$topTopic['id']?>"><?=mb_substr($topTopic['title'], 0, 60) . '.'?></a></h5>
                            </div>
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>




<div class="container">
    <div class="container row">

        <div class="main-content col-md-9 col-12">
            <?php


            if(isset($_GET['id_topic'])){
                $posts = selectAllFromPostsOnTopics('posts', 'users', 'topics', $_GET['id_topic'], $limit, $offset);
                ?>
                <h2>Публикации по категории - <?=$posts[0]['topics_title']?></h2>
                <?php
            }else{
                ?>
                <h2>Последние публикации</h2>
                <?php
                $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', 'topics', $limit, $offset);
            }

            foreach ($posts as $post){
                ?>
                <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?=BASE_URL . 'assets/images/img_for_pages/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h3>
                            <?php
                            if(mb_strlen($post['title']) > 35){
                                ?>
                                <a href="single.php?post=<?=$post['id']?>"><?=mb_substr($post['title'], 0, 35) . '...'?></a>
                            <?php
                            }else{
                                ?>
                                <a href="single.php?post=<?=$post['id']?>"><?=$post['title']?></a>
                            <?php
                            }
                            ?>
                        </h3>
                        <i><img src="assets/images/img_for_style/style_header/user.png" height="20" width="20"><?=$post['username']?></i>
                        <i><img src="assets/images/img_for_style/style_header/calendar.png" height="20" width="20"><?=$post['created_date']?></i>
                        <?php
                        if(mb_strlen($post['content']) > 55){
                            ?>
                            <p class="preview-text"><?=mb_substr($post['content'], 0, 55) . '...'?></p>
                            <?php
                        }else{
                            ?>
                            <p class="preview-text"><?=$post['content']?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }


            include ("app/include/pagination.php");
            ?>
        </div>




        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
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
                        <li><a href="<?=BASE_URL . "index.php?id_topic={$topic['id']}"?>"><?=$topic['topics_title']?></a></li>
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