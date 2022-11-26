
<?php
include("path.php");
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
    <div>
        <h2 class="slider-title">Мои проекты</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-item_img">
                    <a href="/">
                        <img src="assets/images/img_for_style/style_carousel/1.png" class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="/">Подробнее</a></h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-item_img">
                    <a href="/">
                        <img src="assets/images/img_for_style/style_carousel/2.png" class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="/">Подробнее</a></h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-item_img">
                    <a href="/">
                        <img src="assets/images/img_for_style/style_carousel/3.png" class="d-block w-100" alt="...">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="/">Подробнее</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>




<div class="container">
    <div class="container row">

        <div class="main-content col-md-9 col-12">
            <h2>Последние публикации</h2>

            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/img_for_style/style_carousel/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="single.php">Подробнее...</a>
                    </h3>
                    <i><img src="assets/images/img_for_style/style_header/user.png" height="20" width="20">Имя автора</i>
                    <i><img src="assets/images/img_for_style/style_header/calendar.png" height="20" width="20">2022-22-12</i>
                    <p class="preview-text">
                        Lorem sf.jkdsl ldjfls kdjflks djldsjflk jsdlkld sdf
                        dsfsdlkfj jdslfjlds lksdflsdk kldsfkl sdksd sl sdk.
                    </p>
                </div>
            </div>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="assets/images/img_for_style/style_carousel/1.png" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="#">Подробнее...</a>
                    </h3>
                    <i><img src="assets/images/img_for_style/style_header/user.png" height="20" width="20">Имя автора</i>
                    <i><img src="assets/images/img_for_style/style_header/calendar.png" height="20" width="20">2022-22-12</i>
                    <p class="preview-text">
                        Lorem sf.jkdsl ldjfls kdjflks djldsjflk jsdlkld sdf
                        dsfsdlkfj jdslfjlds lksdflsdk kldsfkl sdksd sl sdk.
                    </p>
                </div>
            </div>

        </div>




        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                </form>
            </div>

            <div class="section topics">
                <h3>Темы</h3>
                <ul>
                    <li><a href="#">вапап</a></li>
                    <li><a href="#">вапап</a></li>
                    <li><a href="#">вапап</a></li>
                    <li><a href="#">вапап</a></li>
                    <li><a href="#">вапап</a></li>
                    <li><a href="#">вапап</a></li>
                </ul>
            </div>

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