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
            $seller = $row[0]; // CSV文件的第1列是seller
            if (strlen($seller) < 1) {
                $output['error'] = '賣家編號不符合格式';
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

            $sub = $row[2]; // CSV文件的第3列是sub
            if (strlen($sub) < 1) {
                $output['error'] = '子分類不符合格式';
                $output['code'] = 500;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $photo = $row[3]; // CSV文件的第4列是photo
            if (strlen($photo) < 1) {
                $output['error'] = '圖片名稱不符合格式';
                $output['code'] = 600;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $productName = $row[4]; // CSV文件的第5列是productName
            if (strlen($productName) < 1) {
                $output['error'] = '商品名稱不符合格式';
                $output['code'] = 700;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $productPrice = $row[5]; // CSV文件的第6列是productPrice
            $productPrice2 = intval(trim($productPrice));
            if (!is_numeric($productPrice2)) {
                $output['error'] = '無效的價格';
                $output['code'] = 800;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $productQty = $row[6]; // CSV文件的第7列是productQty
            $productQty2 = intval(trim($productQty));
            if (!is_numeric($productQty2)) {
                $output['error'] = '無效的數量';
                $output['code'] = 900;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $Intro = $row[7]; // CSV文件的第8列是產品介紹
            $Intro = !empty($Intro) ? $Intro : null;
            if (!empty($Intro) && strlen($Intro) > 500) {
                $output['error'] = '產品介紹字數限制500字內';
                $output['code'] = 1000;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $carbonPoints = $row[8]; // CSV文件的第9列是carbonPoints
            if (!is_numeric($carbonPoints)) {
                $output['error'] = '無效的小碳點數量';
                $output['code'] = 1100;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            $createdAt = $row[9]; // CSV文件的第10列是創建時間
            $createdAt = !empty($createdAt) ? date('Y-m-d H:i:s', strtotime($createdAt)) : null;

            $editedTime = $row[10]; // CSV文件的第11列是編輯時間
            $editedTime = !empty($editedTime) ? date('Y-m-d H:i:s', strtotime($editedTime)) : null;

            $status = $row[11]; // CSV文件的第12列是status
            if (strlen($status) < 3) {
                $output['error'] = '商品狀態不符合格式';
                $output['code'] = 1200;
                echo json_encode($output, JSON_UNESCAPED_UNICODE);
                exit;
            }

            // 執行數據庫插入操作，使用SQL語句
            // 根據數據庫結構編寫插入
            if ($createdAt !== null) {
                $sql = "INSERT INTO products 
            (`seller_id`,
            `main_category`,
            `sub_category`,
            `product_photos`,
            `product_name`,
            `product_price`,
            `product_quantity`,
            `product_intro`,
            `carbon_points_available`,
            `created_at`,
            `edit_new`,
            `status_now`) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$seller, $main, $sub, $photo, $productName,  $productPrice, $productQty, $Intro, $carbonPoints, $createdAt, $editedTime, $status]);
            } else {
                $sql = "INSERT INTO products 
            (`seller_id`,
            `main_category`,
            `sub_category`,
            `product_photos`,
            `product_name`,
            `product_price`,
            `product_quantity`,
            `product_intro`,
            `carbon_points_available`,
            `created_at`,
            `edit_new`,
            `status_now`)
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?, Now(), Now(), ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$seller, $main, $sub, $photo, $productName,  $productPrice, $productQty, $Intro, $carbonPoints, $status]);
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
