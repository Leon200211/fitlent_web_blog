<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="/" class="logo">Fitlent blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Услуги</a></li>

                    <li>
                        <?php if(isset($_SESSION['id'])):  ?>
                            <a href="#">
                                <img src="<?=BASE_URL?>assets/images/img_for_style/style_header/user.png" height="20" width="20">
                                <?=$_SESSION['username']?>
                            </a>
                            <ul>
                                <?php if($_SESSION['user_state'] == 'admin'):  ?>
                                    <li><a href="admin/posts/index.php">Админ панель</a></li>
                                <?php endif; ?>
                                <li><a href="logout.php">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a href="login.php">
                                <img src="<?=BASE_URL?>assets/images/img_for_style/style_header/user.png" height="20" width="20">
                                Войти
                            </a>
                            <ul>
                                <li><a href="registration.php">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>