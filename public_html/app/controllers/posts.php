<?php

require_once "../../app/database/db.php";


$topics = SelectAll('topics');
$posts = SelectAll('posts');
$postAdm = selectAllFromPostsWithUsers('posts', 'users');


$title = '';
$content = '';
$topic = '';
$img = '';
$publish = '';

$errMsg = [];


// запись в бд
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['add_post'])) {


    $title = @trim($_POST['title']);
    $content = @trim($_POST['content']);
    $topic = @trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;
    $img = isset($_POST['img']) ?? "";


    if($title === '' || $content === '' ||  $topic === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }else if(mb_strlen($title, 'UTF-8') < 2){
        array_push($errMsg, "Название должно быть более 2-х символов");
    }else{

        // загрузка файла
        if(!empty($_FILES['img']['name'])){
            $imgName = time() . "_" . $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $fileType = $_FILES['img']['type'];
            $destination = ROOT_PATH . "\assets\images\img_for_pages\posts\\" . $imgName;


            // проверка файла на картинку
            if(strpos($fileType, 'image') === false){
                array_push($errMsg, "Файл не является изображением");
            }else{
                $result = move_uploaded_file($fileTmpName, $destination);
                if($result){
                    $img = $imgName;
                }else{
                    array_push($errMsg, "Ошибка при загрузке картинки");
                }
            }

        }else{
            array_push($errMsg, "Ошибка получения картинки");
        }



        // добавление записи в бд
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => addslashes($title),
            'content' => addslashes($content),
            'img' => $img,
            'status' => $publish,
            'id_topic' => $topic,
        ];
        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $post]);
        header('Location:' . BASE_URL . 'admin/posts/index.php');

    }
}







// редактирование записи
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['id'])) {

    $id = $_GET['id'];
    $post = selectOne('posts', ['id' => $id]);

    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];


}
if($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST['edit_post'])) {
    $id = $_POST['id'];
    $title = @trim($_POST['title']);
    $content = @trim($_POST['content']);
    $topic = @trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;
    $img = isset($_POST['img']) ?? "";


    if($title === '' || $content === '' ||  $topic === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }else if(mb_strlen($title, 'UTF-8') < 2){
        array_push($errMsg, "Название должно быть более 2-х символов");
    }else{

        // загрузка файла
        if(!empty($_FILES['img']['name'])){
            $imgName = time() . "_" . $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $fileType = $_FILES['img']['type'];
            $destination = ROOT_PATH . "\assets\images\img_for_pages\posts\\" . $imgName;


            // проверка файла на картинку
            if(strpos($fileType, 'image') === false){
                array_push($errMsg, "Файл не является изображением");
            }else{
                $result = move_uploaded_file($fileTmpName, $destination);
                if($result){
                    $img = $imgName;
                }else{
                    array_push($errMsg, "Ошибка при загрузке картинки");
                }
            }

        }else{
            $img = selectOne('posts', ['id' => $id])['img'];
        }



        // добавление записи в бд
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => addslashes($title),
            'content' => addslashes($content),
            'img' => $img,
            'status' => $publish,
            'id_topic' => $topic,
        ];
        update('posts', $id, $post);
        header('Location:' . BASE_URL . 'admin/posts/index.php');

    }
}


// удаление стать
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['delete_id'])) {

    $delete_id = $_GET['delete_id'];
    delete('posts', $delete_id);

    header('Location:' . BASE_URL . 'admin/posts/index.php');
}

// изменение видимости стать
if($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['pub_id'])) {

    $pub_id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    update('posts', $pub_id, ['status' => $publish]);
    header('Location:' . BASE_URL . 'admin/posts/index.php');
    exit();
}


