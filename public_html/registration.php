<?php
require_once ("path.php");
require_once ("app/controllers/users.php");

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
  <link href="assets/css/style_for_reg_auto/style_for_registration.css" rel="stylesheet">


  <title>Fitlent blog</title>
</head>
<body>




<?php
include("app/include/header.php");
?>


<div class="container reg_form">
  <h2>Регистрация</h2>
  <form class="row justify-content-center" method="post" action="registration.php">
    <div class="mb-3 col-12 col-md-4">
      <label for="login" class="form-label">Ваш логин</label>
      <input type="text" value="<?=$login?>" name="login" class="form-control" id="login" placeholder="Example input placeholder">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="email" class="form-label">Email</label>
      <input type="email" value="<?=$email?>" name="email" class="form-control" id="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="password" class="form-label">Пароль</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="password-second" class="form-label">Повторите пароль</label>
      <input type="password" name="password-second" class="form-control" id="password-second">
    </div>
    <div class="w-100"></div>
      <?php
      if(isset($error)){
          ?>
        <div class="mb-3 col-12 col-md-4 error">Ошибка: <?= $error?></div>
          <div class="w-100"></div>
        <?php
      }
      ?>
    <div class="mb-3 col-12 col-md-4">
      <button type="submit" class="btn btn-secondary" name="button-reg">Зарегистрироваться</button>
      <a href="login.php">Войти</a>
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