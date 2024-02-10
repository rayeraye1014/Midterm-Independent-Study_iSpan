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

  if (strlen($_POST['sub']) < 1 || strlen($_POST['sub']) > 10) {
    $output['error'] = '請填寫正確的名稱';
    $output['code'] = 100;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
  }

  if (($_POST['main']) == "") {
    $output['error'] = '請選擇主分類';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
  }

  $sql = "INSERT INTO categories_sub
      (`sub`, `main_category`) 
      VALUES 
      (?, ?)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $_POST['sub'],
    $_POST['main']
  ]);

  $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
exit;
