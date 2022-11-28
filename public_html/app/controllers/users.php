<?php
include ("app/database/db.php");


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(empty($_POST['login']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['password-second'])){
        $error = "Заполнены не все поля";
        $login = '';
        $email = '';
    }else if(mb_strlen(trim($_POST['login'])) < 3){
        $error = "Слишком короткий логин";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    }else if(trim($_POST['password']) !== trim($_POST['password-second'])){
        $error = "Пароли не совпадают";
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
    }
    else{
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $passF = trim($_POST['password']);
        $passS = trim($_POST['password-second']);
        //$pass = password_hash($_POST['password-second'], PASSWORD_DEFAULT);
        $user_state = 'user';


        $post = [
            'username' => $login,
            'email' => $email,
            'password' => $passF,
            'user_state' => $user_state
        ];

        insert('users', $post);
    }


}else{
    echo "GET";
    $login = "";
    $email = "";
}






