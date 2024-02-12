<?php
#建立連線用

#host是主機，決定連到哪一個主機
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'Nan794@food';
$db_name = 'proj57';

# 設定連線編碼為 utf8mb4
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

# dsn ""中不可以有空格
try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    $conn = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
    //發生錯誤結束資料庫連線並顯示錯誤訊息
    die($e->getMessage());
}

$sql = "SELECT * FROM evaluations";
$rs = $conn->prepare($sql);
$rs->execute();

// 寫入 CSV 的標頭
$csvData = "id,orderId,rating,comments,evaluationDate\n";

// 寫入 CSV 的內容
while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
    $row['comments'] = str_replace(["\r", "\n"], ' ', $row['comments']);
    $csvData .= implode(',', $row) . "\n";
}

// 設定網頁的 Content-Type 為 CSV
header('Content-type: text/csv; charset=utf-8');

// 設定檔案名稱，並告知瀏覽器開啟下載對話框
header("Content-Disposition: attachment; filename=evaluation_list.csv");
$fp = fopen('php://output', 'w');
fprintf($fp, chr(0xEF) . chr(0xBB) . chr(0xBF)); // 添加 BOM
fwrite($fp, $csvData);
fclose($fp);

// 輸出 CSV 資料
echo $csvData;
