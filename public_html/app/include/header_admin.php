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
                    <li>
                        <a href="#">
                            <img src="<?=BASE_URL?>assets/images/img_for_style/style_header/user.png" height="20" width="20">
                            <?=$_SESSION['username']?>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">Выход</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>