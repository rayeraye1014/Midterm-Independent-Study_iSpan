<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!empty($id)) {
    $sql = "DELETE FROM `coupon` WHERE id=$id";
    $pdo->query($sql);
}

$delete_ids = isset($_GET['delete_ids']) ? $_GET['delete_ids'] : [];
foreach ($delete_ids as $id) {
    $id = intval($id);
    if (!empty($id)) {
        $sql = "DELETE FROM `coupons` WHERE id=$id";
        $pdo->query($sql);
    }
}

$backTo = '61.coupon_list.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}
header('Location: ' . $backTo);
