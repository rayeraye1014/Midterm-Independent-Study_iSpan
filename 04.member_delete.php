<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (!empty($sid)) {
  $sql = "DELETE FROM `address_book` WHERE sid=$sid";
  $pdo->query($sql);
}

$delete_ids = isset($_GET['delete_ids']) ? $_GET['delete_ids'] : [];
foreach ($delete_ids as $sid) {
  $sid = intval($sid);
  if (!empty($sid)) {
    $sql = "DELETE FROM `address_book` WHERE sid=$sid";
    $pdo->query($sql);
  }
}

$backTo = '01.member_list.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
  $backTo = $_SERVER['HTTP_REFERER'];
}
header('Location: ' . $backTo);



#?sid=2,7,9    or   ?sid=[]=2&sid[]=7  這種方式來實現打勾方塊多筆資料點選後刪除