<?php
session_start();
require_once("path.php");
require_once ("app/controllers/users.php");
?>


<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_for_main_header.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_for_slider.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_content.css" rel="stylesheet">
    <link href="assets/css/style_for_main_page/style_footer.css" rel="stylesheet">
    <link href="assets/css/style_for_reg_auto/style_for_registration.css" rel="stylesheet">


    <title>Fitlent blog</title>
</head>
<body>




<?php
include("app/include/header.php");
?>


<div class="container reg_form">
    <h2 class="">Авторизация</h2>
    <form class="row justify-content-center" method="post" action="login.php">
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваша почта</label>
            <input type="email" value="<?=$email?>" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="w-100"></div>
        <?php
        if(isset($message)){
            ?>
            <div class="mb-3 col-12 col-md-4 error"><?= $message?></div>
            <div class="w-100"></div>
            <?php
        }
        ?>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" name="button-log" class="btn btn-secondary">Войти</button>
            <a href="registration.php">Зарегистрироваться</a>
        </div>
    </form>
</div>




<?php
include("app/include/footer.php");
?>


<!--Подключение bootstrap-->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>



</body>
</html>