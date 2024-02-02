<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!empty($id)) {
    $sql = "DELETE FROM `products` WHERE id=$id";
    $pdo->query($sql);
}

$delete_ids = isset($_GET['delete_ids']) ? $_GET['delete_ids'] : [];
foreach ($delete_ids as $id) {
    $id = intval($id);
    if (!empty($id)) {
        $sql = "DELETE FROM `products` WHERE id=$id";
        $pdo->query($sql);
    }
}

$backTo = '21.product_list.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}
header('Location: ' . $backTo);



#?sid=2,7,9    or   ?sid=[]=2&sid[]=7  這種方式來實現打勾方塊多筆資料點選後刪除