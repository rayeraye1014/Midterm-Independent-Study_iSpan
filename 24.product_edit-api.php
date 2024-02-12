<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
header('Content-Type: application/json');
$output = [
    'success' => false, # 有沒有編輯成功
    'postData' => $_POST,
    'error' => '資料無修改',
    'code' => 0, # 追踨程式執行的編號
    'files' => [],
];

$newPhotoName = [];


if (!empty($_POST) && !empty($_POST['id'])) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if ($_POST['seller'] == "") {
        $output['error'] = '請選擇名稱!';
        $output['code'] = 100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['main'] == "") {
        $output['error'] = '請選擇商品主分類';
        $output['code'] = 200;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['sub'] == "") {
        $output['error'] = '請選擇商品子分類';
        $output['code'] = 300;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $dir = __DIR__ . './02.imgs/'; # 存放檔案的資料夾
    $exts = [   # 檔案類型的篩選
        'image/jpeg' => '.jpg',
        'image/png' =>  '.png',
        'image/webp' => '.webp',
    ];
    if (!empty($_FILES) && !empty($_FILES['photos'])) {
        if (is_array($_FILES['photos']['name'])) {
            foreach ($_FILES['photos']['name'] as $i => $name) {
                if (!empty($exts[$_FILES['photos']['type'][$i]]) && $_FILES['photos']['error'][$i] == 0) {
                    $ext = $exts[$_FILES['photos']['type'][$i]];
                    $f = sha1($name . uniqid() . rand());
                    if (move_uploaded_file($_FILES['photos']['tmp_name'][$i], $dir . $f . $ext)) {
                        $output['files'][] = `./02.imgs/` . $f . $ext;
                        $newPhotoName[] = $f . $ext;
                    } else {
                        $output['error'] = '無法上傳檔案!';
                        $output['code'] = 401;
                        echo json_encode($output, JSON_UNESCAPED_UNICODE);
                        exit;
                    }
                }
            }
            if (count($output['files'])) {
                $output['success'] = true;
            }
        }
    }

    if ($_POST['name'] == "") {
        $output['error'] = '請填寫商品名稱';
        $output['code'] = 500;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['price'] == "") {
        $output['error'] = '請填寫商品價格';
        $output['code'] = 600;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['qty'] == "") {
        $output['error'] = '請填寫商品數量';
        $output['code'] = 700;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['carbonPoints'] == "") {
        $output['error'] = '請選擇小碳點數量';
        $output['code'] = 800;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['status'] == "") {
        $output['error'] = '請選擇上架狀態';
        $output['code'] = 900;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }


    if (!empty($newPhotoName)) {
        // 如果有上傳新照片時，執行包含product_photos的欄位更動SQL
        $sql = "UPDATE `products` SET
            `seller_id`=?,
            `main_category`=?,
            `sub_category`=?,
            `product_photos`=CONCAT(`product_photos`, ?),  # 保留原有的圖片名稱
            `product_name`=?,
            `product_price`=?,
            `product_quantity`=?,
            `product_intro`=?,
            `carbon_points_available`=?,
            `edit_new`=?,
            `status_now`=? 
            WHERE `id`=?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['seller'],
            $_POST['main'],
            $_POST['sub'],
            ',' . implode(',', $output['files']),  // 加上逗號分隔
            $_POST['name'],
            $_POST['price'],
            $_POST['qty'],
            $_POST['intro'],
            $_POST['carbonPoints'],
            $_POST['editT'],
            $_POST['status'],
            $_POST['id'],
        ]);
    } else {
        //沒有上傳新照片時，執行不包含product_photos的欄位更動SQL
        $sql = "UPDATE `products` SET
        `seller_id`=?,
        `main_category`=?,
        `sub_category`=?,
        `product_name`=?,
        `product_price`=?,
        `product_quantity`=?,
        `product_intro`=?,
        `carbon_points_available`=?,
        `edit_new`=?,
        `status_now`=?,
        `product_photos`=CONCAT(`product_photos`, ',')  # 保留原有的圖片名稱
        WHERE `id`=?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['seller'],
            $_POST['main'],
            $_POST['sub'],
            $_POST['name'],
            $_POST['price'],
            $_POST['qty'],
            $_POST['intro'],
            $_POST['carbonPoints'],
            $_POST['editT'],
            $_POST['status'],
            $_POST['id'],
        ]);
    }
    $output['code'] = 910;
    $output['success'] = boolval($stmt->rowCount());
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
