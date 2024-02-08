<?php
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '一般訂單列表';
$pageName = 'order-normal_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 25;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT COUNT(1) FROM orders_normal";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位

/* 測試用
echo json_encode([
  'totalRows' => $totalRows,
  'totalPages' => $totalPages
]);
exit; #結束 #die('xxx') 功能和exit一樣，但可能破壞頁面
*/

#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT * FROM `orders_normal` ORDER BY id DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

#取得分頁資料
// echo json_encode($rows);
// exit;

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.40_order-normal.php' ?>
    <div class="container table-bordered table-striped">
        <div class="row mt-3">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="?page=1">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page != 1 ? $page - 1 : 1 ?>">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                        </li>
                        <?php $visiblePageRange = 5;   #每頁只可看到5頁頁碼
                        $startPage = max(1, $page - floor($visiblePageRange / 2));
                        $endPage = min($totalPages, $startPage + $visiblePageRange - 1); ?>
                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page != 40 ? $page + 1 : 40 ?>">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=40">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>總金額</th>
                            <th>總數量</th>
                            <th>運費</th>
                            <th>付款狀態</th>
                            <th>運送狀態</th>
                            <th>下單日期</th>
                            <th>訂單完成日期</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $r) : ?>
                            <tr>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['total_price'] ?></td>
                                <td><?= $r['total_amount'] ?></td>
                                <td><?= $r['shipment_fee'] ?></td>
                                <td><?= $r['payment_status'] ?></td>
                                <td><?= $r['shipment_status'] ?></td>
                                <td><?= $r['order_date'] ?></td>
                                <td><?= $r['complete_date'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/0.parts/script.php' ?>

<?php include __DIR__ . '/0.parts/html-foot.php' ?>