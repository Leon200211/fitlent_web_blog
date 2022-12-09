<?php

session_start();


require_once("../../path.php");
require_once("../../app/controllers/posts.php");
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
                <a href="create.php" class="col-3 btn btn-success">Добавить запись</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление записями</a>
            </div>

            <div class="row title-table">
                <h2>Добавление записи</h2>
            </div>



            <div class="row add-post">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <input type="text" value="<?=$title?>" name="title" class="form-control" placeholder="Title" aria-label="Название статьи">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Содержимое записи</label>
                        <textarea name="content" class="form-control" id="editor" rows="3"><?=$content?></textarea>
                    </div>
                    <div class="input-group col mb-4 mt-4">
                        <input name="img" type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <option selected="true" disabled="disabled">Категория</option>
                        <?php
                        foreach ($topics as $topic){
                            ?>
                            <option value="<?=$topic['id']?>"><?=$topic['topics_title']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="form-check">
                        <input name="publish" class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Опубликовать сразу
                        </label>
                    </div>

                    <div class="mb-12 col-12 col-md-12 err">
                        <?php include "../../app/helps/error_info.php"; ?>
                    </div>

                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Добавить запись</button>
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
