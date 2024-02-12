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

  if (strlen($_POST['name']) < 2) {
    $output['error'] = '請填寫正確的姓名';
    $output['code'] = 300;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
  }

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  if ($email === false) {
    # $email = '';   #如果不是必填的情況使用
    $output['error'] = '請填寫正確的Email';         #必填的時候使用
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
  }


  $birthday = null;
  if (!empty($_POST['birthday'])) {
    $birthday = strtotime($_POST['birthday']);
    if ($birthday === false) {
      # 不是合法的日期字串
      $birthday = null;
    } else {
      $birthday = date('Y-m-d', $birthday);
    }
  }

  $sql = "INSERT INTO address_book 
      (`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
      VALUES 
      (?, ?, ?, ?, ?, NOW())";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $_POST['name'],
    $email,
    $_POST['mobile'],
    $birthday,
    $_POST['address']
  ]);

  $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
