<?php

session_start();


require_once("../../path.php");
require_once("../../app/controllers/topics.php");
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
    <link href="../../assets/admin_css/posts_style/admin_post_create_style.css" rel="stylesheet">




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



            <div class="row title-table">
                <h2>Редактирование категории - <?=$title?></h2>
            </div>


            <div class="row add-post">
                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="col">
                        <input type="text" class="form-control" name="title" value="<?=$title?>" placeholder="Название категории" aria-label="Название категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea class="form-control" name="description" id="content" rows="3"><?=$description?></textarea>
                    </div>
                    <div class="w-100"></div>
                    <div class="mb-12 col-12 col-md-12 err">
                        <?php include "../../app/helps/error_info.php"; ?>
                    </div>
                    <div class="col-12">
                        <button name="topic-edit" class="btn btn-primary" type="submit">Обновить категорию</button>
                    </div>
                </form>
            </div>


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
