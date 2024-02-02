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


if (isset($_POST['id'], $_POST['status'], $_POST['formattedTime'])) {
    $productId = $_POST['id'];
    $editTime = $_POST['formattedTime'];
    $newStatus = $_POST['status'];

    // 執行資料庫更新操作
    $sql = "UPDATE `products` SET 
    `edit_new`=?, 
    `status_now`=?  
    WHERE `id`=?";


    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $editTime,
        $newStatus,
        $productId
    ]);

    // 更新成功
    $output['code'] = 200;
    $output['success'] = boolval($stmt->rowCount());
    // 返回需要的資料
    $output['icon'] = ($newStatus === '上架中') ? '<i class="fa-solid fa-turn-down"></i>' : '<i class="fa-solid fa-turn-up"></i>';
    $output['status'] = $newStatus;
    $output['editTime'] = $editTime;
    $output['error'] = '';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
