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
            $orderId = $row[0]; // CSV文件的第1列是訂單編號

            $rating = $row[1]; // CSV文件的第2列是評價分數
            $rating2 = intval(trim($rating));
            if (!is_numeric($rating2) || (is_numeric($rating2) && $rating2 > 5)) {
                $output['error'] = '評價分數格式有誤';
                $output['code'] = 200;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $comment = $row[2]; // CSV文件的第3列是評論
            if (strlen($comment) > 500) {
                $output['error'] = '評論字數不得超過500字';
                $output['code'] = 300;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $evaluationDate = isset($row[3]) ? $row[3] : null; // CSV文件的第4列是創建時間
            $evaluationDate = !empty($evaluationDate) ? date('Y-m-d H:i:s', strtotime($evaluationDate)) : null;


            // 執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            if ($evaluationDate !== null) {
                $sql = "INSERT INTO evaluations 
            (`order_id`,
            `rating`,
            `comments`,
            `evaluation_date`) 
            VALUES 
            (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$orderId, $rating, $comment, $evaluationDate]);
            } else {
                $sql = "INSERT INTO evaluations 
            (`order_id`,
            `rating`,
            `comments`,
            `evaluation_date`) 
            VALUES 
            (?, ?, ?, NOW())";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$orderId, $rating, $comment]);
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
