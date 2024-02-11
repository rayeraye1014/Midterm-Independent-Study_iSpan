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


if (!empty($_POST)) {
    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if ($_POST['couponType'] == "") {
        $output['error'] = '請選擇優惠券類別';
        $output['code'] = 100;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if (strlen($_POST['couponName']) < 1) {
        $output['error'] = '請輸入優惠券名稱';
        $output['code'] = 200;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if (strlen($_POST['couponDiscount']) < 1) {
        $output['error'] = '請輸入(數值+"%")或是("-"+數值)';
        $output['code'] = 300;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $startDate = null;
    if (!empty($_POST['startDate'])) {
        $startDate = strtotime($_POST['startDate']);
        if ($startDate === false) {
            # 不是合法的日期字串
            $startDate = null;
        } else {
            $startDate = date('Y-m-d', $startDate);
        }
    }

    $endDate = null;
    if (!empty($_POST['endDate'])) {
        $endDate = strtotime($_POST['endDate']);
        if ($endDate === false) {
            # 不是合法的日期字串
            $endDate = null;
        } else {
            $endDate = date('Y-m-d', $endDate);
        }
    }

    if ($_POST['couponStatus'] == "") {
        $output['error'] = '請選擇優惠券狀態';
        $output['code'] = 400;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }


    $sql = "INSERT INTO `coupon`
      (`coupon_type`, 
      `coupon_name`, 
      `coupon_discount`,
      `start_date`,
      `vaild_date`,
      `coupon_status`) 
      VALUES 
      (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST["couponType"],
        $_POST['couponName'],
        $_POST['couponDiscount'],
        $_POST['startDate'],
        $_POST['endDate'],
        $_POST['couponStatus'],
    ]);

    $output['success'] = boolval($stmt->rowCount());
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
