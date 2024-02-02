<?php
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
  'success' => false, # 有沒有登入成功
  'postData' => $_POST,
  'code' => 0, # 追踨程式執行的編號
];

if (empty($_POST['email']) or empty($_POST['password'])) {
  # 欄位資料不足
  $output['code'] = 400;
} else {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $sql = "SELECT * FROM team_admin WHERE email=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);
  $row = $stmt->fetch();
  if (empty($row)) {
    # 帳號是錯的--到team_user資料庫
    $sql = "SELECT * FROM team_user WHERE email=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (empty($row)) {
      # team_user中帳號是錯的
      $output['code'] = 410;
    } else {
      # 帳號是對的
      $output['success'] = password_verify($password, $row["password"]);

      $output['code'] = $output['success'] ? 600 : 420;

      if ($output['success']) {
        $_SESSION['user'] = [
          'id' => $row['id'],
          'email' => $email,
          'nickname' => $row['nickname'],
        ];
      }
    }
  } else {
    # 帳號是對的
    $output['success'] = password_verify($password, $row["password"]);

    $output['code'] = $output['success'] ? 700 : 430;

    if ($output['success']) {
      $_SESSION['admin'] = [
        'id' => $row['id'],
        'email' => $email,
        'nickname' => $row['nickname'],
      ];
    }
  }
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
