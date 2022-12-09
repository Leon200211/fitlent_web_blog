<?php

require_once "../../app/database/db.php";


$topics = SelectAll('topics');


$title = '';
$description = '';
$errMsg = [];

// запись в бд
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['topic-create'])) {

    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if($title === '' || $description === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }else if(mb_strlen($title, 'UTF-8') < 2){
        array_push($errMsg, "Категория должна быть более 2-х символов");
    }else{
        $existence = selectOne('topics', ['topics_title' => $title]);
        if(@$existence['topics_title'] === $title){
            array_push($errMsg, "Такая категория уже есть");
        }else{
            $topic = [
                'topics_title' => $title,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);
            header('Location:' . BASE_URL . 'admin/topics/index.php');
        }

    }
}



// редактирование категории
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['id'])) {

    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);

    $title = $topic['topics_title'];
    $description = $topic['description'];

}
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['topic-edit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $id = $_POST['id'];

    if($title === '' || $description === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }else if(mb_strlen($title, 'UTF-8') < 2){
        array_push($errMsg, "Категория должна быть более 2-х символов");
    }else{
        $existence = selectOne('topics', ['topics_title' => $title]);
        $now_name = selectOne('topics', ['id' => $id]);
        if(@$existence['topics_title'] === $title and $now_name['topics_title'] !== $title){
            array_push($errMsg, "Такая категория уже есть");
        }else{
            $topic = [
                'topics_title' => $title,
                'description' => $description
            ];
            $topic = update('topics', $id, $topic);
            header('Location:' . BASE_URL . 'admin/topics/index.php');
        }


    }
}


// удаление категории
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['delete_id'])) {

    $delete_id = $_GET['delete_id'];
    delete('topics', $delete_id);

    header('Location:' . BASE_URL . 'admin/topics/index.php');
}


