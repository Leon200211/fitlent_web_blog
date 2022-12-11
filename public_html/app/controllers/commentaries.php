<?php

session_start();


require_once("../../path.php");
require_once(SITE_ROOT . "/app/database/db.php");



// список всех комментариев
$commentsForAdm = selectAll('comments');

// создание комментария
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['goComment'])) {

    $id_post = $_POST['post'];

    $comment = @trim($_POST['comment']);


    // добавление записи в бд
    $new_comment = [
        'status' => 1,
        'post' => $id_post,
        'id_user' => $_SESSION['id'],
        'comment' => $comment
    ];
    insert('comments', $new_comment);
    header("Location: " . BASE_URL . "single.php?post=$id_post");


}




// удаление комментария
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header("Location: " . BASE_URL . 'admin/comments/index.php');
}
// изменение видимости комментария
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['pub_id'])) {

    $pub_id = $_GET['pub_id'];
    $state = $_GET['publish'];

    update('comments', $pub_id, ['status' => $state]);
    header('Location:' . BASE_URL . 'admin/comments/index.php');

}





// редактирование коммента
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['id'])) {

    $id = $_GET['id'];
    $comment = selectOne('comments', ['id' => $id]);

    $content = $comment['comment'];


}
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['edit_post'])) {
    $id = $_POST['id'];
    $content = @trim($_POST['content']);


    if(mb_strlen($content, 'UTF-8') < 2){
        array_push($errMsg, "Название должно быть более 2-х символов");
    }else{


        // добавление записи в бд
        $post = [
            'comment' => $content
        ];
        update('comments', $id, $post);
        header('Location:' . BASE_URL . 'admin/comments/index.php');

    }
}





