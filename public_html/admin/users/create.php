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
    <link href="../../assets/admin_css/posts_style/admin_post_create_style.css" rel="stylesheet">




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
                <a href="create.php" class="col-3 btn btn-success">Создать пользователя</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление пользователями</a>
            </div>

            <div class="row title-table">
                <h2>Создание пользователя</h2>
            </div>



            <div class="row add-post">
                <form action="create.php" method="post">
                    <div class="col">
                        <label for="login" class="form-label">Ваш логин</label>
                        <input type="text" value="" name="login" class="form-control" id="login" placeholder="Example input placeholder">
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="col">
                        <label for="password-second" class="form-label">Повторите пароль</label>
                        <input type="password" name="password-second" class="form-control" id="password-second">
                    </div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>User</option>
                        <option value="1">Admin</option>
                    </select>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Создать пользователя</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script src="../../assets/js/scripts.js"></script>

</body>
</html>
