<?php


require_once("connect.php");

// вывод информации на экран
function print_arr($arr){
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
}

// Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}




// Запрос получения данных из таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM `$table`";

    // проверка на наличие параметров
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $param){

            // проверка на тип данных ( можно и не делать sql отработает )
            if(!is_numeric($param)){
                $param = "'" . $param . "'";
            }


            if($i === 0){
                $sql = $sql . " WHERE `$key` = $param";
            }else{
                $sql = $sql . " AND `$key` = $param";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();

    // отлов ошибок
    dbCheckError($query);

    return $query->fetchAll();
}
// получение 1 строки с таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM `$table`";

    // проверка на наличие параметров
    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $param){

            // проверка на тип данных ( можно и не делать sql отработает )
            if(!is_numeric($param)){
                $param = "'" . $param . "'";
            }


            if($i === 0){
                $sql = $sql . " WHERE `$key` = $param";
            }else{
                $sql = $sql . " AND `$key` = $param";
            }
            $i++;
        }
    }

    // можно удалить так как используем fetch а не fetchAll
    $sql .= " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute();

    // отлов ошибок
    dbCheckError($query);

    return $query->fetch();
}



// Запись в БД
function insert($table, $params){
    global $pdo;

    $columns = '';
    $mask = '';
    foreach ($params as $key => $param){
        $columns .= "$key,";
        $mask .= "'$param',";
    }
    $columns = rtrim($columns, ',');
    $mask = rtrim($mask, ',');


    $sql = "INSERT INTO `$table` ($columns) VALUES ($mask)";



    $query = $pdo->prepare($sql);
    $query->execute();

    // отлов ошибок
    dbCheckError($query);
    return $pdo->lastInsertId('id');
}



// редактирование в БД
function update($table, $id, $params){
    global $pdo;


    $str_update = '';
    foreach ($params as $key => $param){
        $str_update .= $key . " = '" . $param . "',";
    }
    $str_update = rtrim($str_update, ',');

    $sql = "UPDATE `$table` SET $str_update WHERE `id` = '$id'";


    $query = $pdo->prepare($sql);
    $query->execute();

    // отлов ошибок
    dbCheckError($query);
}


// удаление из БД
function delete($table, $id){
    global $pdo;


    $sql = "DELETE FROM `$table` WHERE `id` = '$id'";


    $query = $pdo->prepare($sql);
    $query->execute();

    // отлов ошибок
    dbCheckError($query);
}



// выбор записи (post) с автором в админку
function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;

    $sql = "SELECT
       t1.id,
       t1.title,
       t1.img,
       t1.content,
       t1.status,
       t1.id_topic,
       t1.created_date,
       t2.username
        FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// выбор постов на главную страницу
function selectAllFromPostsWithUsersOnIndex($table1, $table2, $table3, $limit, $offset){
    global $pdo;

    $sql = "SELECT t1.*, t2.username, t3.topics_title FROM $table1 AS t1 
    INNER JOIN $table2 AS t2 ON t1.id_user = t2.id
    INNER JOIN $table3 AS t3 ON t1.id_topic = t3.id
    WHERE t1.status = 1 ORDER BY t1.id DESC LIMIT $limit OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// вывод постов по определенной категории
// выбор постов на главную страницу
function selectAllFromPostsOnTopics($table1, $table2, $table3, $id_topics, $limit, $offset){
    global $pdo;

    $sql = "SELECT t1.*, t2.username, t3.topics_title FROM $table1 AS t1 
    INNER JOIN $table2 AS t2 ON t1.id_user = t2.id
    INNER JOIN $table3 AS t3 ON t1.id_topic = t3.id
    WHERE t1.status = 1 AND t1.id_topic = $id_topics ORDER BY t1.id DESC LIMIT $limit OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}



// вывод топовых категорий
function selectTopTopics($topic_name){
    global $pdo;

    $id_topic = selectOne('topics', ['topics_title' => $topic_name])['id'];
    $sql = "SELECT `id`, `img`, `title` FROM posts WHERE `id_topic` = '$id_topic' AND `status` = 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}





// Поиск по заголовкам
function searchInTitleAndContent($text, $table1, $table2){
    global $pdo;

    // проверка данных
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));


    $sql = "SELECT t1.*, t2.username FROM $table1 AS t1 
    INNER JOIN $table2 AS t2 ON t1.id_user = t2.id
    WHERE t1.status = 1 AND (t1.title LIKE '%$text%' OR t1.content LIKE '%$text%') ORDER BY t1.id DESC";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}




// выбор одной записи для singlepage
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $table3, $id){
    global $pdo;

    $sql = "SELECT
       t1.id,
       t1.title,
       t1.img,
       t1.content,
       t1.status,
       t1.id_topic,
       t1.created_date,
       t2.username,
       t3.topics_title
        FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
        INNER JOIN $table3 AS t3 ON t1.id_topic = t3.id
        WHERE t1.status = 1 AND t1.id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


// вернуть кол-во строк в таблице
function countRow($table){
    global $pdo;

    $sql = "SELECT COUNT(*) FROM `$table` WHERE `status` = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}
function countRowTopics($table, $id_topics){
    global $pdo;

    $sql = "SELECT COUNT(*) FROM `$table` WHERE `status` = 1 AND `id_topic` = '$id_topics'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}

