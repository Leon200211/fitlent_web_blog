<?php
session_start();

require_once("path.php");
require_once('app/database/db.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['search-term'])){
    $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}

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
    <div class="container row">

        <div class="section search">
            <h3>Поиск</h3>
            <form action="search.php" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
            </form>
        </div>

        <div class="main-content col-12">
            <h2>Результаты поиска</h2>

            <?php
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
            ?>



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