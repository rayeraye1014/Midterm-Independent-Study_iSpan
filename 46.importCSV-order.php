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
            $Type = $row[0]; // CSV文件的第1列是訂單類型
            if (strlen($Type) < 4) {
                $output['error'] = '訂單類型不符合格式';
                $output['code'] = 300;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $seller = $row[1]; // CSV文件的第2列是賣家
            if (empty($seller)) {
                $output['error'] = '請填入賣家編號';
                $output['code'] = 400;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $buyer = $row[2]; // CSV文件的第3列是sub
            if (empty($buyer)) {
                $output['error'] = '請填入買家編號';
                $output['code'] = 500;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $productId = $row[3]; // CSV文件的第4列是產品編號
            $productId2 = intval(trim($productId));
            if (!is_numeric($productId2)) {
                $output['error'] = '產品編號不符合格式';
                $output['code'] = 600;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $shipmentFee = $row[4]; // CSV文件的第5列是運費
            $shipmentFee2 = intval(trim($shipmentFee));
            if (!is_numeric($shipmentFee2)) {
                $output['error'] = '運費不符合格式';
                $output['code'] = 700;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $payment = $row[5]; // CSV文件的第6列是付款狀態
            if (empty($payment)) {
                $output['error'] = '無效的付款狀態';
                $output['code'] = 800;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $shipment = $row[6]; // CSV文件的第7列是運送狀態
            if (empty($shipment)) {
                $output['error'] = '無效的運送狀態';
                $output['code'] = 900;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $orderDate = $row[7]; // CSV文件的第8列是創建時間
            $orderDate = !empty($orderDate) ? date('Y-m-d H:i:s', strtotime($orderDate)) : null;

            $completeStatus = $row[8]; // CSV文件的第9列是完成狀態
            if (empty($completeStatus)) {
                $output['error'] = '無效的訂單完成狀態';
                $output['code'] = 1000;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $completeTime = isset($row[9]) ? $row[9] : null; // CSV文件的第10列是完成時間
            $completeTime = !empty($completeTime) ? date('Y-m-d H:i:s', strtotime($completeTime)) : null;


            // 執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            if ($orderDate !== null) {
                $sql = "INSERT INTO orders 
            (`order_type`,
            `seller_id`,
            `buyer_id`,
            `product_id`,
            `shipment_fee`,
            `payment_status`,
            `shipment_status`,
            `order_date`,
            `complete_status`,
            `complete_date`) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$Type, $seller, $buyer, $productId, $shipmentFee, $payment, $shipment, $orderDate,  $completeStatus,  $completeTime]);
            } else {
                $sql = "INSERT INTO orders 
            (`order_type`,
            `seller_id`,
            `buyer_id`,
            `product_id`,
            `shipment_fee`,
            `payment_status`,
            `shipment_status`,
            `order_date`,
            `complete_status`,
            `complete_date`) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$Type, $seller, $buyer, $productId, $shipmentFee, $payment, $shipment, $completeStatus,  $completeTime]);
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
