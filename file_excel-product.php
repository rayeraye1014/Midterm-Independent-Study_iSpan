<?php
#建立連線用


#host是主機，決定連到哪一個主機
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'Nan794@food';
$db_name = 'proj57';


# dsn ""中不可以有空格
try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
    $conn = new PDO($dsn, $db_user, $db_pass);
    //發生錯誤出現錯誤提醒
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //發生錯誤結束資料庫連線並顯示錯誤訊息
    die($e->getMessage());
}

$sql = "SELECT * FROM products";
$rs = $conn->prepare($sql);
$rs->execute();

// 設定網頁的 Content-Type 為 CSV
header('Content-type: text/csv; charset=utf-8');

// 設定檔案名稱，並告知瀏覽器開啟下載對話框
header("Content-Disposition:attachment;filename=product_list.csv");

$output = fopen('php://output', 'w');

//寫入 CSV 的標頭
fputcsv($output, array('編號', '上架者', '主分類', '子分類', '商品圖片', '商品名稱', '商品價格', '商品數量', '商品介紹', '小碳點數', '建立時間', '最新編輯時間', '上架狀態'));

// 寫入 CSV 的內容，同時進行 Big5 到 UTF-8 的轉碼
while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
    $convertedRow = array_map('big5_to_utf8', $row);
    fputcsv($output, $convertedRow);
}

fclose($output);

// 自訂函式，將 Big5 轉為 UTF-8
function big5_to_utf8($str)
{
    return mb_convert_encoding($str, 'UTF-8', 'Big5');
}
