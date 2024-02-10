<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '評價主頁-admin';
$pageName = 'evaluation_index';

// 計算訂單筆數
$t_sql_evaluation = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id";
$totalRows = $pdo->query($t_sql_evaluation)->fetch(PDO::FETCH_NUM)[0];

$t_sql_evaluation2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單'";
$totalRows2 = $pdo->query($t_sql_evaluation2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_evaluation3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單'";
$totalRows3 = $pdo->query($t_sql_evaluation3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_evaluation4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物'";
$totalRows4 = $pdo->query($t_sql_evaluation4)->fetch(PDO::FETCH_NUM)[0];

//計算一般訂單不同評分數量
$t_sql_normal = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND rating = 1";
$totalnormal = $pdo->query($t_sql_normal)->fetch(PDO::FETCH_NUM)[0];

$t_sql_normal2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND rating = 2";
$totalnormal2 = $pdo->query($t_sql_normal2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_normal3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND rating = 3";
$totalnormal3 = $pdo->query($t_sql_normal3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_normal4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND rating = 4";
$totalnormal4 = $pdo->query($t_sql_normal4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_normal5 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND rating = 5";
$totalnormal5 = $pdo->query($t_sql_normal5)->fetch(PDO::FETCH_NUM)[0];

//計算混合訂單不同評分數量
$t_sql_mix = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND rating = 1";
$totalmix = $pdo->query($t_sql_mix)->fetch(PDO::FETCH_NUM)[0];

$t_sql_mix2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND rating = 2";
$totalmix2 = $pdo->query($t_sql_mix2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_mix3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND rating = 3";
$totalmix3 = $pdo->query($t_sql_mix3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_mix4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND rating = 4";
$totalmix4 = $pdo->query($t_sql_mix4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_mix5 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND rating = 5";
$totalmix5 = $pdo->query($t_sql_mix5)->fetch(PDO::FETCH_NUM)[0];

//計算以物易物不同評分數量
$t_sql_change = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND rating = 1";
$totalchange = $pdo->query($t_sql_change)->fetch(PDO::FETCH_NUM)[0];

$t_sql_change2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND rating = 2";
$totalchange2 = $pdo->query($t_sql_change2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_change3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND rating = 3";
$totalchange3 = $pdo->query($t_sql_change3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_change4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND rating = 4";
$totalchange4 = $pdo->query($t_sql_change4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_change5 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND rating = 5";
$totalchange5 = $pdo->query($t_sql_change5)->fetch(PDO::FETCH_NUM)[0];

//計算一般訂單不同期間筆數-----------------------------------------------------------------------------------------------------
$t_sql_n = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND evaluation_date BETWEEN '2020-01-01' AND '2020-12-31'";
$totalRows5 = $pdo->query($t_sql_n)->fetch(PDO::FETCH_NUM)[0];

$t_sql_n2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND evaluation_date BETWEEN '2021-01-01' AND '2021-12-31'";
$totalRows6 = $pdo->query($t_sql_n2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_n3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND evaluation_date BETWEEN '2022-01-01' AND '2022-12-31'";
$totalRows7 = $pdo->query($t_sql_n3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_n4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND evaluation_date BETWEEN '2023-01-01' AND '2023-12-31'";
$totalRows8 = $pdo->query($t_sql_n4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_n5 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '一般訂單' AND evaluation_date BETWEEN '2024-01-01' AND '2024-12-31'";
$totalRows9 = $pdo->query($t_sql_n5)->fetch(PDO::FETCH_NUM)[0];

//計算混合訂單不同期間筆數-----------------------------------------------------------------------------------------------------
$t_sql_m = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND evaluation_date BETWEEN '2020-01-01' AND '2020-12-31'";
$totalRows10 = $pdo->query($t_sql_m)->fetch(PDO::FETCH_NUM)[0];

$t_sql_m2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND evaluation_date BETWEEN '2021-01-01' AND '2021-12-31'";
$totalRows11 = $pdo->query($t_sql_m2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_m3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND evaluation_date BETWEEN '2022-01-01' AND '2022-12-31'";
$totalRows12 = $pdo->query($t_sql_m3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_m4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND evaluation_date BETWEEN '2023-01-01' AND '2023-12-31'";
$totalRows13 = $pdo->query($t_sql_m4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_m5 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '混合訂單' AND evaluation_date BETWEEN '2024-01-01' AND '2024-12-31'";
$totalRows14 = $pdo->query($t_sql_m5)->fetch(PDO::FETCH_NUM)[0];

//計算以物易物不同期間筆數-----------------------------------------------------------------------------------------------------
$t_sql_c = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND evaluation_date BETWEEN '2020-01-01' AND '2020-12-31'";
$totalRows15 = $pdo->query($t_sql_c)->fetch(PDO::FETCH_NUM)[0];

$t_sql_c2 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND evaluation_date BETWEEN '2021-01-01' AND '2021-12-31'";
$totalRows16 = $pdo->query($t_sql_c2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_c3 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND evaluation_date BETWEEN '2022-01-01' AND '2022-12-31'";
$totalRows17 = $pdo->query($t_sql_c3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_c4 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND evaluation_date BETWEEN '2023-01-01' AND '2023-12-31'";
$totalRows18 = $pdo->query($t_sql_c4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_c5 = "SELECT COUNT(1) FROM evaluations JOIN orders ON evaluations.order_id = orders.id WHERE order_type = '以物易物' AND evaluation_date BETWEEN '2024-01-01' AND '2024-12-31'";
$totalRows19 = $pdo->query($t_sql_c5)->fetch(PDO::FETCH_NUM)[0];




?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
    .overflow-auto {
        height: 1130px;
    }

    #myChart {
        width: 400px;
        height: 300px;
        margin-top: 50px;
    }

    #myChart2 {
        width: 400px;
        height: 300px;
        margin-top: 50px;
    }

    #myChart3 {
        width: 400px;
        height: 300px;
        margin-top: 50px;
    }
</style>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.50_evaluation.php' ?>
    <div class="overflow-auto">
        <div class="container d-flex justify-content-around align-items-center mt-5 mb-5">
            <div class="area left mb-2">
                <table class="table">
                    <thead>
                        <tr class="text-center table-secondary">
                            <th class="text-nowrap" scope="col">評價</th>
                            <th class="text-nowrap" scope="col">評價總數量</th>
                            <th class="text-nowrap" scope="col">一般訂單評價數量</th>
                            <th class="text-nowrap" scope="col">混合訂單評價數量</th>
                            <th class="text-nowrap" scope="col">以物易物評價數量</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">數量</th>
                            <td><?= $totalRows ?></td>
                            <td><?= $totalRows2 ?></td>
                            <td><?= $totalRows3 ?></td>
                            <td><?= $totalRows4 ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="right d-flex flex-column">
                <div class="area2 mb-2">
                    <table class="table">
                        <thead>
                            <tr class="text-center table-secondary">
                                <th class="text-nowrap" scope="col">一般訂單評價</th>
                                <th class="text-nowrap" scope="col">評分5分</th>
                                <th class="text-nowrap" scope="col">評分4分</th>
                                <th class="text-nowrap" scope="col">評分3分</th>
                                <th class="text-nowrap" scope="col">評分2分</th>
                                <th class="text-nowrap" scope="col">評分1分</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th scope="row">數量</th>
                                <td><?= $totalmix5 ?></td>
                                <td><?= $totalmix4 ?></td>
                                <td><?= $totalmix3 ?></td>
                                <td><?= $totalmix2 ?></td>
                                <td><?= $totalmix ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="area3 mb-2">
                    <table class="table">
                        <thead>
                            <tr class="text-center table-secondary">
                                <th class="text-nowrap" scope="col">混合訂單評價</th>
                                <th class="text-nowrap" scope="col">評分5分</th>
                                <th class="text-nowrap" scope="col">評分4分</th>
                                <th class="text-nowrap" scope="col">評分3分</th>
                                <th class="text-nowrap" scope="col">評分2分</th>
                                <th class="text-nowrap" scope="col">評分1分</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th scope="row">數量</th>
                                <td><?= $totalnormal5 ?></td>
                                <td><?= $totalnormal4 ?></td>
                                <td><?= $totalnormal3 ?></td>
                                <td><?= $totalnormal2 ?></td>
                                <td><?= $totalnormal ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="area4 mb-2">
                    <table class="table">
                        <thead>
                            <tr class="text-center table-secondary">
                                <th class="text-nowrap" scope="col">以物易物評價</th>
                                <th class="text-nowrap" scope="col">評分5分</th>
                                <th class="text-nowrap" scope="col">評分4分</th>
                                <th class="text-nowrap" scope="col">評分3分</th>
                                <th class="text-nowrap" scope="col">評分2分</th>
                                <th class="text-nowrap" scope="col">評分1分</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th scope="row">數量</th>
                                <td><?= $totalchange5 ?></td>
                                <td><?= $totalchange4 ?></td>
                                <td><?= $totalchange3 ?></td>
                                <td><?= $totalchange2 ?></td>
                                <td><?= $totalchange ?></td>
                            </tr>
                        </tbody>
                    </table>
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
            <div class="chart3 ms-5">
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
            '2020年', '2021年', '2022年', '2023年', '2024年',
        ],
        datasets: [{
            label: '一般訂單類型建立筆數',
            data: [<?= $totalRows5 ?>, <?= $totalRows6 ?>, <?= $totalRows7 ?>, <?= $totalRows8 ?>, <?= $totalRows9 ?>],
        }]
    };
    new Chart(chartElement, {
        type: 'bar',
        data: data,
    });

    const chartElement2 = document.getElementById('myChart2');
    const data2 = {
        labels: [
            '2020年', '2021年', '2022年', '2023年', '2024年',
        ],
        datasets: [{
            label: '混合訂單類型建立筆數',
            data: [<?= $totalRows10 ?>, <?= $totalRows11 ?>, <?= $totalRows12 ?>, <?= $totalRows13 ?>, <?= $totalRows14 ?>],
        }]
    };
    new Chart(chartElement2, {
        type: 'bar',
        data: data2,
    });

    const chartElement3 = document.getElementById('myChart3');
    const data3 = {
        labels: [
            '2020年', '2021年', '2022年', '2023年', '2024年',
        ],
        datasets: [{
            label: '以物易物類型建立筆數',
            data: [<?= $totalRows15 ?>, <?= $totalRows16 ?>, <?= $totalRows17 ?>, <?= $totalRows18 ?>, <?= $totalRows19 ?>],
        }]
    };
    new Chart(chartElement3, {
        type: 'bar',
        data: data3,
    });
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>