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
            $main = $row[0]; // CSV文件的第1列是主分類
            if (strlen($main) < 4) {
                $output['error'] = '請填寫正確格式的主分類';
                $output['code'] = 300;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $cPoints = $row[1]; // CSV文件的第2列是main
            $cPoints2 = intval(trim($cPoints));
            if (!is_numeric($cPoints2)) {
                $output['error'] = '無效的小碳點值';
                $output['code'] = 400;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            // 執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            $sql = "INSERT INTO categories_main 
            (`main`, `carbon_points_available`) 
            VALUES 
            (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$main, $cPoints]);
        }

        $output['success'] = true;
    } else {

        $output['error'] = '上傳文件時出错：' . $csvFile['error'];
    }
} else {

    $output['error'] = '無效的請求';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
