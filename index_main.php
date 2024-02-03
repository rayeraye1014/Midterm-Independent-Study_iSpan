<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '主頁-admin';
$pageName = 'main-admin';

// 計算product筆數 & address_book筆數
$t_sql_product = "SELECT COUNT(1) FROM products";
$totalRows = $pdo->query($t_sql_product)->fetch(PDO::FETCH_NUM)[0];

$t_sql_member = "SELECT COUNT(1) FROM address_book";
$totalRows2 = $pdo->query($t_sql_member)->fetch(PDO::FETCH_NUM)[0];

//計算product不同期間筆數----------------------------------------------------------------------------------

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

//計算product主分類為男裝服飾時與不同期間的筆數------------------------------------------------------------------------------

$t_sql_man = "SELECT COUNT(1) FROM products WHERE main_category = '4' AND created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows8 = $pdo->query($t_sql_man)->fetch(PDO::FETCH_NUM)[0];

$t_sql_man2 = "SELECT COUNT(1) FROM products WHERE main_category = '4' AND created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows9 = $pdo->query($t_sql_man2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_man3 = "SELECT COUNT(1) FROM products WHERE main_category = '4' AND created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows10 = $pdo->query($t_sql_man3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_man4 = "SELECT COUNT(1) FROM products WHERE main_category = '4' AND created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows11 = $pdo->query($t_sql_man4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_man5 = "SELECT COUNT(1) FROM products WHERE main_category = '4' AND created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows12 = $pdo->query($t_sql_man5)->fetch(PDO::FETCH_NUM)[0];

//計算product主分類為女裝服飾時與不同期間的筆數------------------------------------------------------------------------------

$t_sql_woman = "SELECT COUNT(1) FROM products WHERE main_category = '5' AND created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows13 = $pdo->query($t_sql_woman)->fetch(PDO::FETCH_NUM)[0];

$t_sql_woman2 = "SELECT COUNT(1) FROM products WHERE main_category = '5' AND created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows14 = $pdo->query($t_sql_woman2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_woman3 = "SELECT COUNT(1) FROM products WHERE main_category = '5' AND created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows15 = $pdo->query($t_sql_woman3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_woman4 = "SELECT COUNT(1) FROM products WHERE main_category = '5' AND created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows16 = $pdo->query($t_sql_woman4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_woman5 = "SELECT COUNT(1) FROM products WHERE main_category = '5' AND created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows17 = $pdo->query($t_sql_woman5)->fetch(PDO::FETCH_NUM)[0];

//計算product主分類為美妝保養時與不同期間的筆數------------------------------------------------------------------------------

$t_sql_beauty = "SELECT COUNT(1) FROM products WHERE main_category = '6' AND created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows18 = $pdo->query($t_sql_beauty)->fetch(PDO::FETCH_NUM)[0];

$t_sql_beauty2 = "SELECT COUNT(1) FROM products WHERE main_category = '6' AND created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows19 = $pdo->query($t_sql_beauty2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_beauty3 = "SELECT COUNT(1) FROM products WHERE main_category = '6' AND created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows20 = $pdo->query($t_sql_beauty3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_beauty4 = "SELECT COUNT(1) FROM products WHERE main_category = '6' AND created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows21 = $pdo->query($t_sql_beauty4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_beauty5 = "SELECT COUNT(1) FROM products WHERE main_category = '6' AND created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows22 = $pdo->query($t_sql_beauty5)->fetch(PDO::FETCH_NUM)[0];

//計算product主分類為家具家居時與不同期間的筆數------------------------------------------------------------------------------

$t_sql_home = "SELECT COUNT(1) FROM products WHERE main_category = '11' AND created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows23 = $pdo->query($t_sql_home)->fetch(PDO::FETCH_NUM)[0];

$t_sql_home2 = "SELECT COUNT(1) FROM products WHERE main_category = '11' AND created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows24 = $pdo->query($t_sql_home2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_home3 = "SELECT COUNT(1) FROM products WHERE main_category = '11' AND created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows25 = $pdo->query($t_sql_home3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_home4 = "SELECT COUNT(1) FROM products WHERE main_category = '11' AND created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows26 = $pdo->query($t_sql_home4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_home5 = "SELECT COUNT(1) FROM products WHERE main_category = '11' AND created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows27 = $pdo->query($t_sql_home5)->fetch(PDO::FETCH_NUM)[0];

//計算product主分類為嬰兒孩童時與不同期間的筆數------------------------------------------------------------------------------

$t_sql_baby = "SELECT COUNT(1) FROM products WHERE main_category = '13' AND created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows28 = $pdo->query($t_sql_baby)->fetch(PDO::FETCH_NUM)[0];

$t_sql_baby2 = "SELECT COUNT(1) FROM products WHERE main_category = '13' AND created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows29 = $pdo->query($t_sql_baby2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_baby3 = "SELECT COUNT(1) FROM products WHERE main_category = '13' AND created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows30 = $pdo->query($t_sql_baby3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_baby4 = "SELECT COUNT(1) FROM products WHERE main_category = '13' AND created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows31 = $pdo->query($t_sql_baby4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_baby5 = "SELECT COUNT(1) FROM products WHERE main_category = '13' AND created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows32 = $pdo->query($t_sql_baby5)->fetch(PDO::FETCH_NUM)[0];

//計算product主分類為寵物用品時與不同期間的筆數------------------------------------------------------------------------------

$t_sql_pet = "SELECT COUNT(1) FROM products WHERE main_category = '17' AND created_at BETWEEN '2022-01-01' AND '2022-06-30'";
$totalRows33 = $pdo->query($t_sql_pet)->fetch(PDO::FETCH_NUM)[0];

$t_sql_pet2 = "SELECT COUNT(1) FROM products WHERE main_category = '17' AND created_at BETWEEN '2022-07-01' AND '2022-12-31'";
$totalRows34 = $pdo->query($t_sql_pet2)->fetch(PDO::FETCH_NUM)[0];

$t_sql_pet3 = "SELECT COUNT(1) FROM products WHERE main_category = '17' AND created_at BETWEEN '2023-01-01' AND '2023-06-30'";
$totalRows35 = $pdo->query($t_sql_pet3)->fetch(PDO::FETCH_NUM)[0];

$t_sql_pet4 = "SELECT COUNT(1) FROM products WHERE main_category = '17' AND created_at BETWEEN '2023-07-01' AND '2023-12-31'";
$totalRows36 = $pdo->query($t_sql_pet4)->fetch(PDO::FETCH_NUM)[0];

$t_sql_pet5 = "SELECT COUNT(1) FROM products WHERE main_category = '17' AND created_at BETWEEN '2024-01-01' AND '2024-06-30'";
$totalRows37 = $pdo->query($t_sql_pet5)->fetch(PDO::FETCH_NUM)[0];


?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
  #myChart {
    width: 800px;
    height: 600px;
    margin: auto;
    margin-top: 50px;
    /* background: #f9e498; */
    display: block;
  }

  .chart2 {
    margin-top: 50px;
  }

  #manChart {
    width: 350px;
    height: 300px;
    margin: auto;
  }

  #womanChart {
    width: 350px;
    height: 300px;
    margin: auto;
  }

  #beautyChart {
    width: 350px;
    height: 300px;
    margin: auto;
  }

  #homeChart {
    width: 350px;
    height: 300px;
    margin: auto;
  }

  #babyChart {
    width: 350px;
    height: 300px;
    margin: auto;
  }

  #petChart {
    width: 350px;
    height: 300px;
    margin: auto;
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
    <canvas id="myChart"></canvas>
  </div>
  <div class="chart2 d-flex justify-content-around">
    <div class="">
      <canvas id="manChart"></canvas>
    </div>
    <div class="">
      <canvas id="womanChart"></canvas>
    </div>
    <div class="">
      <canvas id="beautyChart"></canvas>
    </div>
  </div>
  <div class="chart2 d-flex justify-content-around">
    <div class="">
      <canvas id="homeChart"></canvas>
    </div>
    <div class="">
      <canvas id="babyChart"></canvas>
    </div>
    <div class="">
      <canvas id="petChart"></canvas>
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


  const chartElement2 = document.getElementById('manChart');
  const data2 = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '男裝服飾商品建立筆數',
      data: [<?= $totalRows8 ?>, <?= $totalRows9 ?>, <?= $totalRows10 ?>, <?= $totalRows11 ?>, <?= $totalRows12 ?>],
    }]
  };
  new Chart(chartElement2, {
    type: 'line',
    data: data2,
  });

  const chartElement3 = document.getElementById('womanChart');
  const data3 = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '女裝服飾商品建立筆數',
      data: [<?= $totalRows13 ?>, <?= $totalRows14 ?>, <?= $totalRows15 ?>, <?= $totalRows16 ?>, <?= $totalRows17 ?>],
    }]
  };
  new Chart(chartElement3, {
    type: 'line',
    data: data3,
  });

  const chartElement4 = document.getElementById('beautyChart');
  const data4 = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '美妝保養商品建立筆數',
      data: [<?= $totalRows18 ?>, <?= $totalRows19 ?>, <?= $totalRows20 ?>, <?= $totalRows21 ?>, <?= $totalRows22 ?>],
    }]
  };
  new Chart(chartElement4, {
    type: 'line',
    data: data4,
  });

  const chartElement5 = document.getElementById('homeChart');
  const data5 = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '家具家居商品建立筆數',
      data: [<?= $totalRows23 ?>, <?= $totalRows24 ?>, <?= $totalRows25 ?>, <?= $totalRows26 ?>, <?= $totalRows27 ?>],
    }]
  };
  new Chart(chartElement5, {
    type: 'line',
    data: data5,
  });

  const chartElement6 = document.getElementById('babyChart');
  const data6 = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '嬰兒孩童商品建立筆數',
      data: [<?= $totalRows28 ?>, <?= $totalRows29 ?>, <?= $totalRows30 ?>, <?= $totalRows31 ?>, <?= $totalRows32 ?>],
    }]
  };
  new Chart(chartElement6, {
    type: 'line',
    data: data6,
  });

  const chartElement7 = document.getElementById('petChart');
  const data7 = {
    labels: [
      '2022上半年', '2022下半年', '2023上半年', '2023下半年', '2024上半年',
    ],
    datasets: [{
      label: '寵物用品商品建立筆數',
      data: [<?= $totalRows33 ?>, <?= $totalRows34 ?>, <?= $totalRows35 ?>, <?= $totalRows36 ?>, <?= $totalRows37 ?>],
    }]
  };
  new Chart(chartElement7, {
    type: 'line',
    data: data7,
  });
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>