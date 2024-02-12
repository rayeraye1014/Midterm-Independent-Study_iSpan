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
            $Type = $row[0]; // CSV文件的第1列是優惠券類型
            if (empty($Type)) {
                $output['error'] = '優惠券類型不得為空';
                $output['code'] = 300;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $name = $row[1]; // CSV文件的第2列是優惠券名稱
            if (empty($name)) {
                $output['error'] = '請填入優惠券名稱';
                $output['code'] = 400;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $discount = $row[2]; // CSV文件的第3列是折價
            if (empty($discount)) {
                $output['error'] = '請填入折價數';
                $output['code'] = 500;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $startTime = $row[3]; // CSV文件的第4列是開始時間
            $startTime = date('Y-m-d H:i:s', strtotime($startTime));

            $endTime = $row[4]; // CSV文件的第5列是結束時間
            $endTime = date('Y-m-d H:i:s', strtotime($endTime));

            $status = $row[5]; // CSV文件的第6列是優惠券狀態
            if (empty($status)) {
                $output['error'] = '無效的優惠券完成狀態';
                $output['code'] = 600;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            // 執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            $sql = "INSERT INTO coupon 
            (`coupon_type`,
            `coupon_name`,
            `coupon_discount`,
            `start_date`,
            `vaild_date`,
            `coupon_status`) 
            VALUES 
            (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$Type, $name, $discount, $startTime, $endTime,  $status]);
        }

        $output['success'] = true;
    } else {

        $output['error'] = '上傳文件時出错：' . $csvFile['error'];
    }
} else {

    $output['error'] = '無效的請求';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
