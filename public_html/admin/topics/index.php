<?php

session_start();

require_once "../../app/controllers/topics.php";
require_once("../../path.php");
?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <link href="../../assets/admin_css/style.css" rel="stylesheet">
    <link href="../../assets/admin_css/main_style/style_header.css" rel="stylesheet">
    <link href="../../assets/admin_css/main_style/style_footer.css" rel="stylesheet">
    <link href="../../assets/admin_css/posts_style/admin_posts_menu.css" rel="stylesheet">
    <link href="../../assets/admin_css/posts_style/admin_posts_style.css" rel="stylesheet">




    <title>Fitlent blog</title>
</head>
<body>


<?php
include("../../app/include/header_admin.php");
?>




<div class="container">
    <div class="row">


        <?php
        include '../../app/include/sidebar_admin.php';
        ?>




        <div class="posts col-9">

            <div class="button row">
                <a href="create.php" class="col-3 btn btn-success">Добавить категорию</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление категориями</a>
            </div>

            <div class="row title-table">
                <h2>Управление категориями</h2>
                <div class="id col-1">ID</div>
                <div class="title col-5">Название</div>
                <div class="red col-4">Действия</div>
            </div>


                <?php
                foreach ($topics as $key => $topic){
                    ?>
                    <div class="row post">
                        <div class="id col-1"><?=$key+1?></div>
                        <div class="title col-5"><?=$topic['topics_title']?></div>
                        <div class="red col-2">
                            <a href="edit.php?id=<?=$topic['id']?>">edit</a>
                        </div>
                        <div class="del col-2">
                            <a href="edit.php?delete_id=<?=$topic['id']?>">delete</a>
                        </div>
                    </div>
                    <?php
                }
                ?>


        </div>


    </div>
</div>





<?php
include("../../app/include/footer.php");
?>

<!--Подключение bootstrap-->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
