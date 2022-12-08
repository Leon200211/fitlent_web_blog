<?php

require_once "../../app/database/db.php";


$topics = SelectAll('topics');


$name = '';
$description = '';
$errMsg = [];

// запись в бд
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['topic-create'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }else if(mb_strlen($name, 'UTF-8') < 2){
        array_push($errMsg, "Категория должна быть более 2-х символов");
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if(@$existence['name'] === $name){
            array_push($errMsg, "Такая категория уже есть");
        }else{
            $topic = [
                'name' => $name,
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

    $name = $topic['name'];
    $description = $topic['description'];

}
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['topic-edit'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $id = $_POST['id'];

    if($name === '' || $description === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }else if(mb_strlen($name, 'UTF-8') < 2){
        array_push($errMsg, "Категория должна быть более 2-х символов");
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        $now_name = selectOne('topics', ['id' => $id]);
        if(@$existence['name'] === $name and $now_name['name'] !== $name){
            array_push($errMsg, "Такая категория уже есть");
        }else{
            $topic = [
                'name' => $name,
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


