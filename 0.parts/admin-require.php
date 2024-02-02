<?php


#確認有登入的狀態才可以讀取某頁面的功能
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['admin'])) {
  header('Location: index_main.php');
  exit;
}
