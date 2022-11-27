<?php
include ("app/database/db.php");

if(!empty($_POST['login']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['password-second'])){
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password-second'], PASSWORD_DEFAULT);
    $user_state = 'user';


    $post = [
        'username' => $login,
        'email' => $email,
        'password' => $pass,
        'user_state' => $user_state
    ];

    $id = insert('users', $post);


}




