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



$params = [
    'username' => 'dfdfgdfg',
    'email' => 'leon@yandex.ru'
];
$arrData = [
    'username' => 'fd',
    'email' => 'afd',
    'password' => 'sfdsdf',
    'user_state' => 'sd',
];

//print_arr(selectAll('users', $params));
//print_arr(selectOne('users', $params));
//insert('users', $arrData);
//update('users', 1, $params);
delete('users', 3);





