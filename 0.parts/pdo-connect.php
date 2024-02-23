<?php
#建立連線用


#host是主機，決定連到哪一個主機


# dsn ""中不可以有空格
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     #設定這個之後，後面就不需要fetchAll()中間放PDO::FETCH_ASSOC
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);  # PDO 資料庫連線物件


if (!isset($_SESSION)) {
  session_start();
}
