<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
    'success' => false, # 有沒有修改成功
    'postData' => $_POST,
    'error' => '資料無修改',
    'code' => 0, # 追踨程式執行的編號
];


if (!empty($_POST) && !empty($_POST['id'])) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if (strlen($_POST['sub']) == "") {
        $output['error'] = '請填寫正確的名稱';
        $output['code'] = 100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['main_category'] == "") {
        $output['error'] = '請填寫主分類代碼';
        $output['code'] = 400;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }




    $sql = "UPDATE `categories_sub` SET `sub`=?,`main_category`=? WHERE `id`=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['sub'],
        $_POST['main_category'],
        $_POST['id'],
    ]);
    $output['code'] = 200;
    $output['success'] = boolval($stmt->rowCount());
}




echo json_encode($output, JSON_UNESCAPED_UNICODE);
