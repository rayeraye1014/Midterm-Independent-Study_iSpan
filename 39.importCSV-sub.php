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
            $sub = $row[0]; // CSV文件的第1列是子分類
            if (empty($sub)) {
                $output['error'] = '請填寫子分類';
                $output['code'] = 300;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $main = $row[1]; // CSV文件的第2列是main
            $main2 = intval(trim($main));
            if (!is_numeric($main2)) {
                $output['error'] = '無效的主分類值';
                $output['code'] = 400;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            // 執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            $sql = "INSERT INTO categories_sub 
            (`sub`, `main_category`) 
            VALUES 
            (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$sub, $main]);
        }

        $output['success'] = true;
    } else {

        $output['error'] = '上傳文件時出错：' . $csvFile['error'];
    }
} else {

    $output['error'] = '無效的請求';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
