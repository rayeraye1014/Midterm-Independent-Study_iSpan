<?php
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
    'success' => false, # 有沒有註冊成功
    'postData' => $_POST,
    'error' => '',
    'code' => 0, # 追踨程式執行的編號
];


if (!empty($_POST)) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if ($email === false) {
        # $email = '';   #如果不是必填的情況使用
        $output['error'] = '請填寫正確的Email';         #必填的時候使用
        $output['code'] = 100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if (strlen($_POST['password']) < 1) {
        $output['error'] = '請填寫正確的密碼';
        $output['code'] = 200;
        echo json_encode($output,  JSON_UNESCAPED_UNICODE);
        exit;
    }

    if (strlen($_POST['mobile']) < 11) {
        $output['error'] = '請填寫正確的手機';
        $output['code'] = 300;
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

    //生成隨機鹽值
    $salt = bin2hex(random_bytes(16));
    //將鹽值和密碼結合，使用雜湊函數計算雜湊值
    $passwordHash = hash(($_POST['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO team_user
      (`email`, `password`, `mobile`, `address` ,`birthday`, `nickname`, `created_at`) 
      VALUES 
      (?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $email,
        $passwordHash,
        $_POST['mobile'],
        $_POST['address'],
        $birthday,
        $_POST['nickname']
    ]);

    $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
