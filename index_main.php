<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '主頁-admin';
$pageName = 'main-admin';

$t_sql_product = "SELECT COUNT(1) FROM products";
$totalRows = $pdo->query($t_sql_product)->fetch(PDO::FETCH_NUM)[0];

$t_sql_member = "SELECT COUNT(1) FROM address_book";
$totalRows2 = $pdo->query($t_sql_member)->fetch(PDO::FETCH_NUM)[0];

$t_sql_product = "SELECT COUNT(1) FROM products WHERE created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows3 = $pdo->query($t_sql_product)->fetch(PDO::FETCH_NUM)[0];

$t_sql_prosuct2 = "SELECT COUNT(1) FROM products WHERE created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows4 = $pdo->query($t_sql_prosuct2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_prosuct3 = "SELECT COUNT(1) FROM products WHERE created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows5 = $pdo->query($t_sql_prosuct3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_prosuct4 = "SELECT COUNT(1) FROM products WHERE created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows6 = $pdo->query($t_sql_prosuct4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_prosuct5 = "SELECT COUNT(1) FROM products WHERE created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows7 = $pdo->query($t_sql_prosuct5)->fetch(PDO::FETCH_NUM)[0];




?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
  #myChart {
    margin: auto;
    margin-top: 50px;
    /* background: #f9e498; */
    display: block;
  }
</style>
<div class="container-fluid px-0 mx-0">
  <?php include __DIR__ . '/0.parts/navbar_main.php' ?>
  <div class="container d-flex justify-content-around mt-5 mb-5">
    <div class="d-flex border border-dark border-3 rounded-3" style="width: 17rem;">
      <div class="">
        <img src="https://picsum.photos/140/120?image=51" alt="">
      </div>
      <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
        <h5 class="mt-2">會員數量</h5>
        <p><?= $totalRows2 ?></p>
      </div>
    </div>
    <div class="d-flex border border-dark border-3 rounded-3" style="width: 17rem;">
      <div class="">
        <img src="https://picsum.photos/140/120?image=521" alt="">
      </div>
      <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
        <h5 class="mt-2">商品數量</h5>
        <p><?= $totalRows ?></p>
      </div>
    </div>
    <div class="d-flex border border-dark border-3 rounded-3" style="width: 17rem;">
      <div class="">
        <img src="https://picsum.photos/140/120?image=50" alt="">
      </div>
      <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
        <h5 class="mt-2">訂單數量</h5>
        <p>1000</p>
      </div>
    </div>
  </div>
  <div class="chart">
    <!-- 長條圖顯示的位置 -->
    <canvas id="myChart" style="width:800px; height:600px;"></canvas>
  </div>
</div>
<?php include __DIR__ . '/0.parts/script.php' ?>

<!-- 長條圖的原始程式碼, 可以移除掉長條圖就會消失 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const chartElement = document.getElementById('myChart');
  const data = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '商品建立筆數',
      data: [<?= $totalRows3 ?>, <?= $totalRows4 ?>, <?= $totalRows5 ?>, <?= $totalRows6 ?>, <?= $totalRows7 ?>],
    }]
  };
  new Chart(chartElement, {
    type: 'line',
    data: data,
  });
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>