<?php

#host是主機，決定連到哪一個主機
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'Nan794@food';
$db_name = 'proj57';


# dsn ""中不可以有空格
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
$pdo = new PDO($dsn, $db_user, $db_pass);  # PDO 資料庫連線物件
