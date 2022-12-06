<?php

session_start();


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
                <a href="create.php" class="col-3 btn btn-success">Создать пользователя</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление пользователями</a>
            </div>

            <div class="row title-table">
                <h2>Управление пользователями</h2>
                <div class="id col-1">ID</div>
                <div class="title col-5">Логин</div>
                <div class="author col-2">Роль</div>
                <div class="red col-4">Управление</div>
            </div>



            <div class="row post">
                <div class="id col-1">1</div>
                <div class="title col-5">Леон</div>
                <div class="author col-2">Пользователь</div>
                <div class="red col-2">
                    <a href="#">edit</a>
                </div>
                <div class="del col-2">
                    <a href="#">delete</a>
                </div>
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
