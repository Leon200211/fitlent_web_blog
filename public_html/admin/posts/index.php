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


        <div class="sidebar col-3">
            <ul>
                <li>
                    <a href="#">Записи</a>
                </li>
                <li>
                    <a href="#">Категории</a>
                </li>
                <li>
                    <a href="#">Пользователи</a>
                </li>
            </ul>
        </div>




        <div class="posts col-9">

            <div class="button row">
                <a href="create.php" class="col-3 btn btn-success">Добавить запись</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление записями</a>
            </div>

            <div class="row title-table">
                <h2>Управление записями</h2>
                <div class="id col-1">ID</div>
                <div class="title col-5">Название</div>
                <div class="author col-2">Автор</div>
                <div class="red col-4">Действия</div>
            </div>



            <div class="row post">
                <div class="id col-1">1</div>
                <div class="title col-5">Лучшие сайты</div>
                <div class="author col-2">Леон</div>
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
