<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '會員主頁-admin';
$pageName = 'member_index';

// 計算會員各地區筆數
$t_sql_member = "SELECT COUNT(1) FROM address_book";
$totalRows = $pdo->query($t_sql_member)->fetch(PDO::FETCH_NUM)[0];

$t_sql_gilun = "SELECT COUNT(1) FROM address_book WHERE address = '基隆市'";
$totalGilun = $pdo->query($t_sql_gilun)->fetch(PDO::FETCH_NUM)[0];

$t_sql_taipei = "SELECT COUNT(1) FROM address_book WHERE address = '臺北市'";
$totalTaipei = $pdo->query($t_sql_taipei)->fetch(PDO::FETCH_NUM)[0];

$t_sql_newpei = "SELECT COUNT(1) FROM address_book WHERE address = '新北市'";
$totalNewpei = $pdo->query($t_sql_newpei)->fetch(PDO::FETCH_NUM)[0];

$t_sql_tauyun = "SELECT COUNT(1) FROM address_book WHERE address = '桃園市'";
$totalTauyun = $pdo->query($t_sql_tauyun)->fetch(PDO::FETCH_NUM)[0];

$t_sql_xinzhu = "SELECT COUNT(1) FROM address_book WHERE address = '新竹市'";
$totalXinzhu = $pdo->query($t_sql_xinzhu)->fetch(PDO::FETCH_NUM)[0];

$t_sql_xinzhu2 = "SELECT COUNT(1) FROM address_book WHERE address = '新竹縣'";
$totalXinzhu2 = $pdo->query($t_sql_xinzhu2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_miauli = "SELECT COUNT(1) FROM address_book WHERE address = '苗栗縣'";
$totalMiauli = $pdo->query($t_sql_miauli)->fetch(PDO::FETCH_NUM)[0];

$t_sql_zhuhua = "SELECT COUNT(1) FROM address_book WHERE address = '彰化縣'";
$totalZhuhua = $pdo->query($t_sql_zhuhua)->fetch(PDO::FETCH_NUM)[0];

$t_sql_nantou = "SELECT COUNT(1) FROM address_book WHERE address = '南投縣'";
$totalNantou = $pdo->query($t_sql_nantou)->fetch(PDO::FETCH_NUM)[0];

$t_sql_taichung = "SELECT COUNT(1) FROM address_book WHERE address = '臺中市'";
$totalTaichung = $pdo->query($t_sql_taichung)->fetch(PDO::FETCH_NUM)[0];

$t_sql_yunlin = "SELECT COUNT(1) FROM address_book WHERE address = '雲林縣'";
$totalYunlin = $pdo->query($t_sql_yunlin)->fetch(PDO::FETCH_NUM)[0];

$t_sql_jiayi = "SELECT COUNT(1) FROM address_book WHERE address = '嘉義市'";
$totalJiayi = $pdo->query($t_sql_jiayi)->fetch(PDO::FETCH_NUM)[0];

$t_sql_jiayi2 = "SELECT COUNT(1) FROM address_book WHERE address = '嘉義縣'";
$totalJiayi2 = $pdo->query($t_sql_jiayi2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_tainan = "SELECT COUNT(1) FROM address_book WHERE address = '台南市'";
$totalTainan = $pdo->query($t_sql_tainan)->fetch(PDO::FETCH_NUM)[0];

$t_sql_kauoshung = "SELECT COUNT(1) FROM address_book WHERE address = '高雄市'";
$totalKauoshung = $pdo->query($t_sql_kauoshung)->fetch(PDO::FETCH_NUM)[0];

$t_sql_pingdong = "SELECT COUNT(1) FROM address_book WHERE address = '屏東縣'";
$totalPingdong = $pdo->query($t_sql_pingdong)->fetch(PDO::FETCH_NUM)[0];

$t_sql_yilan = "SELECT COUNT(1) FROM address_book WHERE address = '宜蘭縣'";
$totalYilan = $pdo->query($t_sql_yilan)->fetch(PDO::FETCH_NUM)[0];

$t_sql_hualian = "SELECT COUNT(1) FROM address_book WHERE address = '花蓮縣'";
$totalHualian = $pdo->query($t_sql_hualian)->fetch(PDO::FETCH_NUM)[0];

$t_sql_taidung = "SELECT COUNT(1) FROM address_book WHERE address = '臺東縣'";
$totalTaidung = $pdo->query($t_sql_taidung)->fetch(PDO::FETCH_NUM)[0];

$t_sql_benghu = "SELECT COUNT(1) FROM address_book WHERE address = '澎湖縣'";
$totalBenghu = $pdo->query($t_sql_benghu)->fetch(PDO::FETCH_NUM)[0];

$t_sql_jinm = "SELECT COUNT(1) FROM address_book WHERE address = '金門縣'";
$totalJinm = $pdo->query($t_sql_jinm)->fetch(PDO::FETCH_NUM)[0];

$t_sql_lienjing = "SELECT COUNT(1) FROM address_book WHERE address = '連江縣'";
$totalLienjing  = $pdo->query($t_sql_lienjing)->fetch(PDO::FETCH_NUM)[0];


//計算會員生日不同期間筆數----------------------------------------------------------------------------------

$t_sql_time = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '1985-01-01' AND '1990-12-31'";
$totalRows3 = $pdo->query($t_sql_time)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time2 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '1991-01-01' AND '1995-12-31'";
$totalRows4 = $pdo->query($t_sql_time2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time3 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '1996-01-01' AND '1999-12-31'";
$totalRows5 = $pdo->query($t_sql_time3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time4 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '2000-01-01' AND '2005-12-31'";
$totalRows6 = $pdo->query($t_sql_time4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time5 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '2006-01-01' AND '2010-12-31'";
$totalRows7 = $pdo->query($t_sql_time5)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time6 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '2011-01-01' AND '2015-12-31'";
$totalRows8 = $pdo->query($t_sql_time6)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time7 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '2016-01-01' AND '2020-12-31'";
$totalRows9 = $pdo->query($t_sql_time7)->fetch(PDO::FETCH_NUM)[0];

$t_sql_time8 = "SELECT COUNT(1) FROM address_book WHERE birthday BETWEEN '2021-01-01' AND '2025-12-31'";
$totalRows10 = $pdo->query($t_sql_time8)->fetch(PDO::FETCH_NUM)[0];



?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
    .overflow-auto {
        height: 1130px;
    }

    #myChart {
        width: 800px;
        height: 600px;
        margin: auto;
        margin-top: 50px;
        /* background: #f9e498; */
        display: block;
    }
</style>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.10_member.php' ?>
    <div class="overflow-auto">
        <div class="container d-flex justify-content-around align-items-center mt-5 mb-5">
            <div class="d-flex flex-column me-4">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">地區</th>
                            <th class="text-nowrap" scope="col">會員總數量</th>
                            <th class="text-nowrap" scope="col">基隆市</th>
                            <th class="text-nowrap" scope="col">臺北市</th>
                            <th class="text-nowrap" scope="col">新北市</th>
                            <th class="text-nowrap" scope="col">桃園市</th>
                            <th class="text-nowrap" scope="col">新竹市</th>
                            <th class="text-nowrap" scope="col">新竹縣</th>
                            <th class="text-nowrap" scope="col">苗栗縣</th>
                            <th class="text-nowrap" scope="col">彰化縣</th>
                            <th class="text-nowrap" scope="col">南投縣</th>
                            <th class="text-nowrap" scope="col">臺中市</th>
                            <th class="text-nowrap" scope="col">雲林縣</th>
                            <th class="text-nowrap" scope="col">嘉義市</th>
                            <th class="text-nowrap" scope="col">嘉義縣</th>
                            <th class="text-nowrap" scope="col">臺南市</th>
                            <th class="text-nowrap" scope="col">高雄市</th>
                            <th class="text-nowrap" scope="col">屏東縣</th>
                            <th class="text-nowrap" scope="col">宜蘭縣</th>
                            <th class="text-nowrap" scope="col">花蓮縣</th>
                            <th class="text-nowrap" scope="col">臺東縣</th>
                            <th class="text-nowrap" scope="col">澎湖縣</th>
                            <th class="text-nowrap" scope="col">金門縣</th>
                            <th class="text-nowrap" scope="col">連江縣</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">數量</th>
                            <td><?= $totalRows ?></td>
                            <td><?= $totalGilun ?></td>
                            <td><?= $totalTaipei ?></td>
                            <td><?= $totalNewpei ?></td>
                            <td><?= $totalTauyun ?></td>
                            <td><?= $totalXinzhu ?></td>
                            <td><?= $totalXinzhu2 ?></td>
                            <td><?= $totalMiauli ?></td>
                            <td><?= $totalZhuhua ?></td>
                            <td><?= $totalNantou ?></td>
                            <td><?= $totalTaichung ?></td>
                            <td><?= $totalYunlin ?></td>
                            <td><?= $totalJiayi ?></td>
                            <td><?= $totalJiayi2 ?></td>
                            <td><?= $totalTainan ?></td>
                            <td><?= $totalKauoshung ?></td>
                            <td><?= $totalPingdong ?></td>
                            <td><?= $totalYilan ?></td>
                            <td><?= $totalHualian ?></td>
                            <td><?= $totalTaidung ?></td>
                            <td><?= $totalBenghu ?></td>
                            <td><?= $totalJinm ?></td>
                            <td><?= $totalLienjing ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="chart">
            <!-- 長條圖顯示的位置 -->
            <canvas id="myChart"></canvas>
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
            '1985-1990', '1991-1995', '1996-2000', '2001-2005', '2006-2010', '2011-2015', '2016-2020', '2021-2025'
        ],
        datasets: [{
            label: '會員建立筆數',
            data: [<?= $totalRows3 ?>, <?= $totalRows4 ?>, <?= $totalRows5 ?>, <?= $totalRows6 ?>, <?= $totalRows7 ?>, <?= $totalRows8 ?>, <?= $totalRows9 ?>, <?= $totalRows10 ?>],
        }]
    };
    new Chart(chartElement, {
        type: 'line',
        data: data,
    });
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>