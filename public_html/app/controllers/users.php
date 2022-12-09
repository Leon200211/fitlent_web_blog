<?php
require_once SITE_ROOT . "/app/database/db.php";



$users = SelectAll('users');

// регистрация пользователя
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['button-reg'])){
    if(empty($_POST['login']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password-second'])){
        $message = "Заполнены не все поля";
        $login = $_POST['login'];
        $email = $_POST['email'];
    }else if(mb_strlen(trim($_POST['login'])) < 3){
        $message = "Слишком короткий логин";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    }else if(trim($_POST['password']) !== trim($_POST['password-second'])){
        $message = "Пароли не совпадают";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    } else{
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $passF = trim($_POST['password']);
        $passS = trim($_POST['password-second']);


        // проверка на зарегистрированную почту
        $existence = selectOne('users', ['email' => $email]);
        if(isset($existence['email']) and $existence['email'] === $email){
            $message = "Такая почта уже зарегистрирована";
        }else{
            $pass = password_hash($_POST['password-second'], PASSWORD_DEFAULT);
            $post = [
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'user_state' => 'user'
            ];

            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_state'] = $user['user_state'];
            header('Location: ' . BASE_URL);
        }

    }

}

if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['button-log'])) {
    if(!empty($_POST['email']) or !empty($_POST['password'])){
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);

        // проверка на вход
        $existence = selectOne('users', ['email' => $email]);
        if(isset($existence) and password_verify($pass, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['username'] = $existence['username'];
            $_SESSION['user_state'] = $existence['user_state'];

            if($_SESSION['user_state'] == 'admin'){
                header('Location: ' . BASE_URL . "admin/posts/index.php");
            }else{
                header('Location: ' . BASE_URL);
            }
        }else{
            $message = "Почта или пароль введены не верны";
        }

    }else{
        $message = "Заполнены не все поля";
    }

} else{
    $login = "";
    $email = "";
}




// добавление пользователя в админке
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['create-user'])){
    $errMsg = [];
    if(empty($_POST['login']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password-second'])){
        $errMsg[] = "Заполнены не все поля";
        $login = $_POST['login'];
        $email = $_POST['email'];
    }else if(mb_strlen(trim($_POST['login'])) < 3){
        $errMsg[] = "Слишком короткий логин";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    }else if(trim($_POST['password']) !== trim($_POST['password-second'])){
        $errMsg[] = "Пароли не совпадают";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    } else{
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $passF = trim($_POST['password']);
        $passS = trim($_POST['password-second']);
        $user_state = trim($_POST['user_state']);

        // проверка на зарегистрированную почту
        $existence = selectOne('users', ['email' => $email]);
        if(isset($existence['email']) and $existence['email'] === $email){
            $errMsg[] = "Такая почта уже зарегистрирована";
        }else{
            $pass = password_hash($_POST['password-second'], PASSWORD_DEFAULT);
            $post = [
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'user_state' => $user_state
            ];

            insert('users', $post);


            header('Location: index.php');
        }

    }

}









// редактирование пользователя
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['id_edit'])) {

    $id = $_GET['id_edit'];
    $user = selectOne('users', ['id' => $id]);

    $login = $user['username'];
    $email = $user['email'];
    $user_state = $user['user_state'];

}
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['user-edit'])) {
    $errMsg = [];
    $user_state = trim($_POST['user_state']);
    if(empty($_POST['login']) or empty($_POST['email'])){
        $errMsg[] = "Заполнены не все поля";
        $login = $_POST['login'];
        $email = $_POST['email'];
    }else if(mb_strlen(trim($_POST['login'])) < 3){
        $errMsg[] = "Слишком короткий логин";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    }else{
        $id = trim($_POST['id']);
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);

        if(!empty($_POST['password'])){
            $pass = trim($_POST['password']);
            $pass = password_hash($pass, PASSWORD_DEFAULT);
        }else{
            $pass = selectOne('users', ['id' => $id])['password'];
        }

        // проверка на зарегистрированную почту
        $existence = selectOne('users', ['email' => $email]);
        if(@$existence['id'] != $id){
            array_push($errMsg, "Такая почта уже зарегистрирована");
        } else{
            $user = [
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'user_state' => $user_state
            ];

            update('users', $id, $user);
            header('Location:' . BASE_URL . 'admin/users/index.php');
        }

    }

}



// удаление пользователя
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['delete_id'])) {

    $delete_id = $_GET['delete_id'];
    delete('users', $delete_id);

    header('Location:' . BASE_URL . 'admin/users/index.php');
}


