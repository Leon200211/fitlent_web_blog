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

            <div class="button row">
                <a href="create.php" class="col-3 btn btn-success">Добавить категорию</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление категориями</a>
            </div>

            <div class="row title-table">
                <h2>Добавление категории</h2>
            </div>


            <div class="row add-post">
                <form action="create.php" method="post">
                    <div class="col">
                        <input type="text" class="form-control" name="name" value="<?=$name?>" placeholder="Название категории" aria-label="Название категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea class="form-control" name="description" id="content" rows="3"><?=$description?></textarea>
                    </div>
                    <div class="w-100"></div>
                    <?php
                    if(isset($errMsg)){
                        ?>
                        <div class="mb-3 col-12 col-md-4 error" style="color: red;"><?= $errMsg?></div>
                        <div class="w-100"></div>
                        <?php
                    }
                    ?>
                    <div class="col-12">
                        <button name="topic-create" class="btn btn-primary" type="submit">Сохранить категорию</button>
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
