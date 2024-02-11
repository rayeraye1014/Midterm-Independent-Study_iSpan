<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
    'success' => false, # 有沒有新增成功
    'postData' => $_POST,
    'error' => '資料無修改',
    'code' => 0, # 追踨程式執行的編號
];


if (!empty($_POST) && !empty($_POST['id'])) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定


    if ($_POST['orderType'] == "") {
        $output['error'] = '請選擇訂單類型';
        $output['code'] = 200;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['buyer'] == "") {
        $output['error'] = '請選擇買家編號';
        $output['code'] = 300;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['rating'] == "") {
        $output['error'] = '請選擇評分分數';
        $output['code'] = 400;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if (strlen($_POST['comment']) > 300) {
        $output['error'] = '評論字數不得超過300字';
        $output['code'] = 500;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "UPDATE `evaluations` SET 
      `rating`=?, 
      `comments`=? 
      WHERE `id`=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['rating'],
        $_POST['comment'],
        $_POST['id'],
    ]);

    $output['code'] = 910;
    $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
