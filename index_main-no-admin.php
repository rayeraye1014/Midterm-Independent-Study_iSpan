<?php
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '主頁-noAdmin';
$pageName = 'main-noadmin';

$t_sql_product = "SELECT COUNT(1) FROM products";
$totalRows = $pdo->query($t_sql_product)->fetch(PDO::FETCH_NUM)[0];

$t_sql_member = "SELECT COUNT(1) FROM address_book";
$totalRows2 = $pdo->query($t_sql_member)->fetch(PDO::FETCH_NUM)[0];

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.php' ?>
    <div class="container">
        <h2>USER權限 : 只可觀看</h2>
        <div class="container d-flex justify-content-around mt-5">
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
    </div>
</div>
<?php include __DIR__ . '/0.parts/script.php' ?>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>