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


if (!empty($_POST) && !empty($_POST['id'])) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if ($_POST['orderType'] == "") {
        $output['error'] = '請選擇訂單類型';
        $output['code'] = 100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['seller'] == "") {
        $output['error'] = '請選擇賣家編號';
        $output['code'] = 200;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['buyer'] == "") {
        $output['error'] = '請選擇買家編號';
        $output['code'] = 300;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['productName'] == "") {
        $output['error'] = '請選擇商品名稱';
        $output['code'] = 400;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['productPrice'] == "") {
        $output['error'] = '請選擇商品金額';
        $output['code'] = 500;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['totalPrice'] == "") {
        $output['error'] = '請填寫商品總金額';
        $output['code'] = 600;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['payStatus'] == "") {
        $output['error'] = '請選擇付款狀態';
        $output['code'] = 700;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['payStatus'] == "尚未付款" && $_POST['orderStatus'] == '已完成') {
        $output['error'] = '尚未付款不可完成訂單';
        $output['code'] = 800;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['payStatus'] == "尚未付款" && $_POST['shipStatus'] == '已寄出') {
        $output['error'] = '尚未付款不可寄出商品';
        $output['code'] = 900;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['shipStatus'] == "尚未寄出" && $_POST['orderStatus'] == '已完成') {
        $output['error'] = '尚未寄出不可完成訂單';
        $output['code'] = 1000;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['shipStatus'] == "") {
        $output['error'] = '請選擇運送狀態';
        $output['code'] = 1100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['orderStatus'] == "") {
        $output['error'] = '請選擇訂單狀態';
        $output['code'] = 1200;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_POST['orderStatus'] == "已完成" && $_POST['completeD'] == "") {
        $output['error'] = '請選擇訂單完成日期';
        $output['code'] = 1300;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }


    $sql = "UPDATE `orders` SET
      `order_type`=?,
      `seller_id`=?, 
      `buyer_id`=?, 
      `product_id`=?, 
      `shipment_fee`=?, 
      `payment_status`=?, 
      `shipment_status`=?,  
      `complete_status`=?, 
      `complete_date`=?
      WHERE `id`=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST["orderType"],
        $_POST['seller'],
        $_POST['buyer'],
        $_POST['productName'],
        $_POST['shipmentFee'],
        $_POST['payStatus'],
        $_POST['shipStatus'],
        $_POST['orderStatus'],
        $_POST['completeD'],
        $_POST['id'],
    ]);

    $output['code'] = 910;
    $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
