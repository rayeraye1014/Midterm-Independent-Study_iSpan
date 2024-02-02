<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
    'success' => false, # 有沒有編輯成功
    'postData' => $_POST,
    'error' => '資料無修改',
    'code' => 0, # 追踨程式執行的編號
];


if (!empty($_POST) && !empty($_POST['id'])) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if (strlen($_POST['main']) == "") {
        $output['error'] = '請填寫正確的名稱或字數超出限制(10)!';
        $output['code'] = 100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $carbonPoints = $_POST['carbon_points_available'];
    if (strlen($carbonPoints) < 1 || !is_numeric($carbonPoints)) {
        $output['error'] = '請填寫正確的數值';
        $output['code'] = 400;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }




    $sql = "UPDATE `categories_main` SET `main`=?,`carbon_points_available`=? WHERE `id`=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['main'],
        $_POST['carbon_points_available'],
        $_POST['id']
    ]);
    $output['code'] = 200;
    $output['success'] = boolval($stmt->rowCount());
}




echo json_encode($output, JSON_UNESCAPED_UNICODE);
