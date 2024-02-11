<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '優惠券主頁-admin';
$pageName = 'coupon_index';

// 計算優惠券筆數
$t_sql_coupon = "SELECT COUNT(1) FROM coupon";
$totalRows = $pdo->query($t_sql_coupon)->fetch(PDO::FETCH_NUM)[0];

$t_sql_couponType = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '免運券'";
$totalcouponType = $pdo->query($t_sql_couponType)->fetch(PDO::FETCH_NUM)[0];

$t_sql_couponType2 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '運費半價券'";
$totalcouponType2 = $pdo->query($t_sql_couponType2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_couponType3 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折扣券'";
$totalcouponType3 = $pdo->query($t_sql_couponType3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_couponType4 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折價券'";
$totalcouponType4 = $pdo->query($t_sql_couponType4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_status = "SELECT COUNT(1) FROM coupon WHERE coupon_status = '未開始'";
$totalstatus = $pdo->query($t_sql_status)->fetch(PDO::FETCH_NUM)[0];

$t_sql_status2 = "SELECT COUNT(1) FROM coupon WHERE coupon_status = '進行中'";
$totalstatus2 = $pdo->query($t_sql_status2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_status3 = "SELECT COUNT(1) FROM coupon WHERE coupon_status = '已過期'";
$totalstatus3 = $pdo->query($t_sql_status3)->fetch(PDO::FETCH_NUM)[0];


//分區1
$t_sql_coupon2 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '免運券' AND coupon_status = '未開始'";
$totalRows2 = $pdo->query($t_sql_coupon2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon3 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '免運券' AND coupon_status = '進行中'";
$totalRows3 = $pdo->query($t_sql_coupon3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon4 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '免運券' AND coupon_status = '已過期'";
$totalRows4 = $pdo->query($t_sql_coupon4)->fetch(PDO::FETCH_NUM)[0];

//分區2
$t_sql_coupon5 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '運費半價券' AND coupon_status = '未開始'";
$totalRows5 = $pdo->query($t_sql_coupon5)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon6 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '運費半價券' AND coupon_status = '進行中'";
$totalRows6 = $pdo->query($t_sql_coupon6)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon7 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '運費半價券' AND coupon_status = '已過期'";
$totalRows7 = $pdo->query($t_sql_coupon7)->fetch(PDO::FETCH_NUM)[0];

//分區3
$t_sql_coupon8 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折扣券' AND coupon_status = '未開始'";
$totalRows8 = $pdo->query($t_sql_coupon8)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon9 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折扣券' AND coupon_status = '進行中'";
$totalRows9 = $pdo->query($t_sql_coupon9)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon10 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折扣券' AND coupon_status = '已過期'";
$totalRows10 = $pdo->query($t_sql_coupon10)->fetch(PDO::FETCH_NUM)[0];

//分區4
$t_sql_coupon11 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折價券' AND coupon_status = '未開始'";
$totalRows11 = $pdo->query($t_sql_coupon11)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon12 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折價券' AND coupon_status = '進行中'";
$totalRows12 = $pdo->query($t_sql_coupon12)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon13 = "SELECT COUNT(1) FROM coupon WHERE coupon_type = '折價券' AND coupon_status = '已過期'";
$totalRows13 = $pdo->query($t_sql_coupon13)->fetch(PDO::FETCH_NUM)[0];

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
        width: 600px;
        height: 400px;
        margin-top: 50px;
    }

    #myChart4 {
        width: 600px;
        height: 400px;
        margin-top: 50px;
    }
</style>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.60_coupon.php' ?>
    <div class="overflow-auto">
        <div class="container d-flex justify-content-around align-items-center mt-5 mb-5">
            <div class="me-5">
                <div class="d-flex border border-dark border-3 rounded-3" style="width: 20rem;">
                    <div class="pic">
                        <img src="https://picsum.photos/140/120?image=621" alt="">
                    </div>
                    <div class="ms-5 d-flex flex-column justify-content-center align-items-center">
                        <h5 class="mt-2">優惠券數量</h5>
                        <p><?= $totalRows ?></p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="d-flex mb-3">
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=321" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">免運券數量</h5>
                            <p><?= $totalcouponType ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=121" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">運費半價券數量</h5>
                            <p><?= $totalcouponType2 ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=120" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">折扣券數量</h5>
                            <p><?= $totalcouponType3 ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=100" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">折價券數量</h5>
                            <p><?= $totalcouponType4 ?></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=68" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">未開始優惠券數量</h5>
                            <p><?= $totalstatus ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=70" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">進行中優惠券數量</h5>
                            <p><?= $totalstatus2 ?></p>
                        </div>
                    </div>
                    <div class="d-flex border border-dark border-3 rounded-3 me-4" style="width: 17rem;">
                        <div class="">
                            <img src="https://picsum.photos/140/120?image=66" alt="">
                        </div>
                        <div class="mx-3 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="mt-2">已過期優惠券數量</h5>
                            <p><?= $totalstatus3 ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <div class="area1 d-flex justify-content-center">
                <div class="chart">
                    <!-- 長條圖顯示的位置 -->
                    <canvas id="myChart"></canvas>
                </div>
                <div class="chart2 ms-5">
                    <!-- 長條圖顯示的位置 -->
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="area2 d-flex justify-content-center">
                <div class="chart3">
                    <!-- 長條圖顯示的位置 -->
                    <canvas id="myChart3"></canvas>
                </div>
                <div class="chart4 ms-5">
                    <!-- 長條圖顯示的位置 -->
                    <canvas id="myChart4"></canvas>
                </div>
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
            '未開始', '進行中', '已過期',
        ],
        datasets: [{
            label: '免運券各狀態筆數',
            data: [<?= $totalRows2 ?>, <?= $totalRows3 ?>, <?= $totalRows4 ?>],
        }]
    };
    new Chart(chartElement, {
        type: 'bar',
        data: data,
    });

    const chartElement2 = document.getElementById('myChart2');
    const data2 = {
        labels: [
            '未開始', '進行中', '已過期',
        ],
        datasets: [{
            label: '運費半價券各狀態筆數',
            data: [<?= $totalRows5 ?>, <?= $totalRows6 ?>, <?= $totalRows7 ?>],
        }]
    };
    new Chart(chartElement2, {
        type: 'bar',
        data: data2,
    });

    const chartElement3 = document.getElementById('myChart3');
    const data3 = {
        labels: [
            '未開始', '進行中', '已過期',
        ],
        datasets: [{
            label: '折扣券各狀態筆數',
            data: [<?= $totalRows8 ?>, <?= $totalRows9 ?>, <?= $totalRows10 ?>],
        }]
    };
    new Chart(chartElement3, {
        type: 'bar',
        data: data3,
    });

    const chartElement4 = document.getElementById('myChart4');
    const data4 = {
        labels: [
            '未開始', '進行中', '已過期',
        ],
        datasets: [{
            label: '折價券各狀態筆數',
            data: [<?= $totalRows11 ?>, <?= $totalRows12 ?>, <?= $totalRows13 ?>],
        }]
    };
    new Chart(chartElement4, {
        type: 'bar',
        data: data4,
    });
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>