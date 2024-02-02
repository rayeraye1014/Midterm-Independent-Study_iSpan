<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
  'success' => false, # 有沒有新增成功
  'postData' => $_POST,
  'error' => '',
  'code' => 0, # 追踨程式執行的編號
];


if (!empty($_POST)) {
  // TODO: 檢查各個欄位的資料, 有沒有符合規定

  if (strlen($_POST['main']) < 1 || strlen($_POST['main']) > 100) {
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

  $sql = "INSERT INTO categories_main
      (`main`, `carbon_points_available`) 
      VALUES 
      (?, ?)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $_POST['main'],
    $_POST['carbon_points_available']
  ]);

  $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
