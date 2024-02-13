<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '訂單主頁-admin';
$pageName = 'order_index';

// 計算訂單筆數
$t_sql_order = "SELECT COUNT(1) FROM orders";
$totalRows = $pdo->query($t_sql_order)->fetch(PDO::FETCH_NUM)[0];

$t_sql_orderType = "SELECT COUNT(1) FROM orders WHERE order_type = '一般訂單'";
$totalorderType = $pdo->query($t_sql_orderType)->fetch(PDO::FETCH_NUM)[0];

$t_sql_orderType2 = "SELECT COUNT(1) FROM orders WHERE order_type = '混合訂單'";
$totalorderType2 = $pdo->query($t_sql_orderType2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_orderType3 = "SELECT COUNT(1) FROM orders WHERE order_type = '以物易物'";
$totalorderType3 = $pdo->query($t_sql_orderType3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_complete = "SELECT COUNT(1) FROM orders WHERE complete_status = '進行中'";
$totalcomplete = $pdo->query($t_sql_complete)->fetch(PDO::FETCH_NUM)[0];

$t_sql_complete2 = "SELECT COUNT(1) FROM orders WHERE complete_status = '已完成'";
$totalcomplete2 = $pdo->query($t_sql_complete2)->fetch(PDO::FETCH_NUM)[0];

//取產品名字用
$product = "SELECT * FROM products";
$stmt4 = $pdo->query($product);
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$order = "SELECT orders.id, order_type, orders.seller_id, buyer_id, product_id, shipment_fee, payment_status, shipment_status, order_date, complete_status, complete_date, product_name, product_price FROM orders JOIN products ON orders.product_id = products.id";
$stmt = $pdo->query($order);
$rows2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 計算前5多出現的商品
$t_sql_id = "SELECT product_id, COUNT(*) as product_count
FROM orders
GROUP BY product_id
ORDER BY product_count DESC
LIMIT 1";
$one = $pdo->query($t_sql_id)->fetch(PDO::FETCH_ASSOC);

$t_sql_id2 = "SELECT product_id, COUNT(*) as product_count
FROM orders
GROUP BY product_id
ORDER BY product_count DESC
LIMIT 1 OFFSET 1";
$two = $pdo->query($t_sql_id2)->fetch(PDO::FETCH_ASSOC);

$t_sql_id3 = "SELECT product_id, COUNT(*) as product_count
FROM orders
GROUP BY product_id
ORDER BY product_count DESC
LIMIT 1 OFFSET 2";
$three = $pdo->query($t_sql_id3)->fetch(PDO::FETCH_ASSOC);

$t_sql_id4 = "SELECT product_id, COUNT(*) as product_count
FROM orders
GROUP BY product_id
ORDER BY product_count DESC
LIMIT 1 OFFSET 3";
$four = $pdo->query($t_sql_id4)->fetch(PDO::FETCH_ASSOC);

$t_sql_id5 = "SELECT product_id, COUNT(*) as product_count
FROM orders
GROUP BY product_id
ORDER BY product_count DESC
LIMIT 1 OFFSET 4";
$five = $pdo->query($t_sql_id5)->fetch(PDO::FETCH_ASSOC);

foreach ($rows4 as $r4) :
    if ($r4['id'] == $one['product_id']) $name1 = $r4['product_name'];
    if ($r4['id'] == $two['product_id']) $name2 = $r4['product_name'];
    if ($r4['id'] == $three['product_id']) $name3 = $r4['product_name'];
    if ($r4['id'] == $four['product_id']) $name4 = $r4['product_name'];
    if ($r4['id'] == $five['product_id']) $name5 = $r4['product_name'];
endforeach;

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
    .overflow-auto {
        height: 1130px;
    }

    #myChart {
        width: 600px;
        height: 400px;
        margin-top: 50px;
    }

    #myChart2 {
        width: 600px;
        height: 400px;
        margin-top: 50px;
    }

    #myChart3 {
        width: 800px;
        height: 600px;
        margin-top: 50px;
    }
</style>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.40_order.php' ?>
    <div class="overflow-auto">
        <div class="container d-flex justify-content-around align-items-center mt-5 mb-5">
            <div class="">
                <div class="d-flex border border-dark border-3 rounded-3" style="width: 20rem;">
                    <div class="pic">
                        <img src="https://picsum.photos/140/120?image=521" alt="">
                    </div>
                    <div class="ms-5 d-flex flex-column justify-content-center align-items-center">
                        <h5 class="mt-2">訂單數量</h5>
                        <p><?= $totalRows ?></p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="d-flex mb-3">
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=51" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">一般訂單數量</h5>
                            <p><?= $totalorderType ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=50" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">混合訂單數量</h5>
                            <p><?= $totalorderType2 ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=65" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">以物易物訂單數量</h5>
                            <p><?= $totalorderType3 ?></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=68" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">進行中訂單數量</h5>
                            <p><?= $totalcomplete ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=70" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">已完成訂單數量</h5>
                            <p><?= $totalcomplete2 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="chart">
                <!-- 長條圖顯示的位置 -->
                <canvas id="myChart"></canvas>
            </div>
            <div class="chart2 ms-5">
                <!-- 長條圖顯示的位置 -->
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="chart3">
                <!-- 長條圖顯示的位置 -->
                <canvas id="myChart3"></canvas>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/0.parts/script.php' ?>

<!-- 長條圖的原始程式碼, 可以移除掉長條圖就會消失 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartElement = document.getElementById('myChart');
    const data = {
        labels: [
            '一般訂單', '混合訂單', '以物易物',
        ],
        datasets: [{
            label: '訂單類型建立筆數',
            data: [<?= $totalorderType ?>, <?= $totalorderType2 ?>, <?= $totalorderType3 ?>],
        }]
    };
    new Chart(chartElement, {
        type: 'bar',
        data: data,
    });

    const chartElement2 = document.getElementById('myChart2');
    const data2 = {
        labels: [
            '進行中訂單', '已完成訂單',
        ],
        datasets: [{
            label: '訂單成交建立筆數',
            data: [<?= $totalcomplete ?>, <?= $totalcomplete2 ?>],
        }]
    };
    new Chart(chartElement2, {
        type: 'bar',
        data: data2,
    });


    const chartElement3 = document.getElementById('myChart3');
    const data3 = {
        labels: [
            '<?= $name1 ?>', '<?= $name2 ?>', '<?= $name3 ?>', '<?= $name4 ?>', '<?= $name5 ?>'
        ],
        datasets: [{
            label: '前五銷售排名商品',
            data: [<?= $one['product_count'] ?? 0 ?>, <?= $two['product_count'] ?? 0 ?>, <?= $three['product_count'] ?? 0 ?>, <?= $four['product_count'] ?? 0 ?>, <?= $five['product_count'] ?? 0 ?>],
        }]
    };
    new Chart(chartElement3, {
        type: 'bar',
        data: data3,
    });
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>