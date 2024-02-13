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

$t_sql_order = "SELECT COUNT(1) FROM orders";
$totalRows3 = $pdo->query($t_sql_order)->fetch(PDO::FETCH_NUM)[0];

$t_sql_evaluation = "SELECT COUNT(1) FROM evaluations";
$totalRows4 = $pdo->query($t_sql_evaluation)->fetch(PDO::FETCH_NUM)[0];

$t_sql_coupon = "SELECT COUNT(1) FROM coupon";
$totalRows5 = $pdo->query($t_sql_coupon)->fetch(PDO::FETCH_NUM)[0];

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
</style>
<div class="container-fluid px-0 mx-0">
  <?php include __DIR__ . '/0.parts/navbar_main.php' ?>
  <div class="container d-flex flex-column mt-5 mb-5">
    <h2 class="text-center">Admin Mode具權限，可進行CRUD</h2>
    <div class="area1 d-flex justify-content-center">
      <div class="d-flex border border-dark border-3 rounded-3 mt-5 me-5" style="width: 17rem;">
        <div class="">
          <img src="https://picsum.photos/140/120?image=51" alt="">
        </div>
        <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
          <h5 class="mt-2">會員數量</h5>
          <p><?= $totalRows2 ?></p>
        </div>
      </div>
      <div class="d-flex border border-dark border-3 rounded-3 mt-5 me-5" style="width: 17rem;">
        <div class="">
          <img src="https://picsum.photos/140/120?image=60" alt="">
        </div>
        <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
          <h5 class="mt-2">商品數量</h5>
          <p><?= $totalRows ?></p>
        </div>
      </div>
      <div class="d-flex border border-dark border-3 rounded-3 mt-5 me-5" style="width: 17rem;">
        <div class="">
          <img src="https://picsum.photos/140/120?image=88" alt="">
        </div>
        <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
          <h5 class="mt-2">訂單數量</h5>
          <p><?= $totalRows3 ?></p>
        </div>
      </div>
    </div>
    <div class="area2 d-flex justify-content-center mt-5">
      <div class="d-flex border border-dark border-3 rounded-3 mt-5 me-5" style="width: 17rem;">
        <div class="">
          <img src="https://picsum.photos/140/120?image=94" alt="">
        </div>
        <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
          <h5 class="mt-2">評價數量</h5>
          <p><?= $totalRows4 ?></p>
        </div>
      </div>
      <div class="d-flex border border-dark border-3 rounded-3 mt-5 me-5" style="width: 17rem;">
        <div class="">
          <img src="https://picsum.photos/140/120?image=90" alt="">
        </div>
        <div class="mx-3 d-flex flex-column justify-content-center align-item-center">
          <h5 class="mt-2 text-nowrap">優惠券數量</h5>
          <p><?= $totalRows5 ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php include __DIR__ . '/0.parts/script.php' ?>

  <?php include __DIR__ . '/0.parts/html-foot.php' ?>