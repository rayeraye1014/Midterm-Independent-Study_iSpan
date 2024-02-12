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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $csvFile = $_FILES['csvFile'];

    if ($csvFile['error'] === UPLOAD_ERR_OK) {
        $csvData = array_map('str_getcsv', file($csvFile['tmp_name']));

        // 迭代CSV數據，插入到數據庫中
        foreach ($csvData as $row) {
            $name = $row[0]; // CSV文件的第1列是姓名
            if (strlen($name) < 2) {
                $output['error'] = '請填寫正確的姓名';
                $output['code'] = 300;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $email = $row[1]; // CSV文件的第2列是mail
            $email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
            if ($email2 === false) {
                # $email = '';   #如果不是必填的情況使用
                $output['error'] = '請填寫正確的Email';  //必填的時候使用
                $output['code'] = 400;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $mobile = $row[2]; // CSV文件的第3列是手機
            $mobile = trim($mobile, "'"); // 去除单引号
            if (!preg_match('/^\d{10}$/', $mobile)) {
                $output['error'] = '請填寫正確的手機格式';
                $output['code'] = 500;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $birthday = $row[3]; // CSV文件的第4列是生日
            $birthday = !empty($birthday) ? date('Y-m-d', strtotime($birthday)) : null;

            $address = $row[4]; // CSV文件的第5列是地址
            if (strlen($address) < 3) {
                $output['error'] = '請填寫正確的地址ˋ';
                $output['code'] = 600;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $createdAt = $row[5]; // CSV文件的第6列是創建時間
            $createdAt = !empty($createdAt) ? date('Y-m-d', strtotime($createdAt)) : null;

            // 在這裡執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            if ($createdAt !== null) {
                $sql = "INSERT INTO address_book 
            (`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
            VALUES 
            (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$name, $email, $mobile, $birthday, $address, $createdAt]);
            } else {
                $sql = "INSERT INTO address_book 
            (`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) 
            VALUES
            (?, ?, ?, ?, ?, Now())";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$name, $email, $mobile, $birthday, $address]);
            }
        }

        $output['success'] = true;
    } else {

        $output['error'] = '上傳文件時出错：' . $csvFile['error'];
    }
} else {

    $output['error'] = '無效的請求';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
