<?php
if (!isset($pageName)) {
    $pageName = '';
}

?>

<style>
    .navbar-nav .nav-link {
        padding-left: 5px;
    }

    .navbar-nav .nav-link.active {
        background-color: lightskyblue;
        color: darkblue;
        border-radius: 5px;
        font-weight: 800;
        padding-left: 5px;
    }

    .color-a {
        color: white;
    }

    .color-strong {
        color: blue;
        font-weight: 900;
    }
</style>

<?php if ($pageName == 'add_product' || $pageName == 'edit_product') : ?>
    <div class="px-0 mx-0 shadow">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index_main.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ADMIN MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'product_list' ? 'active' : '' ?>" href="21.product_list.php">商品列表</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'product_list' ? 'active' : '' ?>" href="21.product_list.php">商品列表</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link "><?= $_SESSION[isset($_SESSION['admin']) ? 'admin' : 'user']['nickname'] ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">登出</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'login' ? 'active' : '' ?>" href="login.php">登入</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'regist' ? 'active' : '' ?>" href="register.php">註冊</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<?php else : ?>
    <div class="px-0 mx-0 shadow">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index_main.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ADMIN MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'product_list' ? 'active' : '' ?>" href="21.product_list.php">商品列表</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'product_index' ? 'active' : '' ?>" href="20.product_index.php">商品圖表統計</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'product_list' ? 'active' : '' ?>" href="21.product_list.php">商品列表</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['admin']) || isset($_SESSION['user'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link "><?= $_SESSION[isset($_SESSION['admin']) ? 'admin' : 'user']['nickname'] ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">登出</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'login' ? 'active' : '' ?>" href="login.php">登入</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'regist' ? 'active' : '' ?>" href="register.php">註冊</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <?php if ($pageName == 'product_list' || $pageName == 'product_list-boy' || $pageName == 'product_list-girl' || $pageName == 'product_list-beauty' || $pageName == 'product_list-home' || $pageName == 'product_list-baby' || $pageName == 'product_list-pet') : ?>
        <div class="mx-1">
            <div class="card text-center mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list' ? 'true' : '' ?>" href="21.product_list.php">所有商品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">免費禮物</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">電腦科技</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">手機配件</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list-boy' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list-boy' ? 'true' : '' ?>" href="21.product_list-admin_boy.php">男裝服飾</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list-girl' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list-girl' ? 'true' : '' ?>" href="21.product_list-admin_girl.php">女裝服飾</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list-beauty' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list-beauty' ? 'true' : '' ?>" href="21.product_list-admin_beauty.php">美妝保養</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">名牌精品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">電玩遊戲</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">耳機錄音</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">相機拍攝</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list-home' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list-home' ? 'true' : '' ?>" href="21.product_list-admin_home.php">家具家居</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">電視電器</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list-baby' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list-baby' ? 'true' : '' ?>" href="21.product_list-admin_baby.php">嬰兒孩童</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">健康營養品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">運動用品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">食物飲料</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'product_list-pet' ? 'active' : '' ?>" aria-current="<?= $pageName == 'product_list-pet' ? 'true' : '' ?>" href="21.product_list-admin_pet.php">寵物用品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">門票票券</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">機車汽車</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == '' ? 'active' : '' ?>" aria-current="<?= $pageName == '' ? 'true' : '' ?>" href="#">其他其他</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-1 d-flex justify-content-between">
                    <div class="input-group-sm d-flex ms-2">
                        <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="搜尋產品名稱關鍵字">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchProd()">
                            搜尋產品
                        </button>
                        <div class="d-flex align-item-center p-1">
                            <a href="21.product_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>

                    <div class="input-group-sm d-flex justify-content-end me-3">
                        <input id="minPrice" type="number" name="low" class="rounded-start ps-1" placeholder="輸入最低價格">
                        <input id="maxPrice" type="number" name="high" class="ps-1" placeholder="輸入最高價格">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchPrice()">
                            搜尋價格
                        </button>
                        <div class="d-flex align-item-center p-1">
                            <a href="21.product_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between my-1 mx-2">
                    <div class="">
                        <button type="button" class="btn btn-warning btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="change_status_down(id)">一鍵下架</a></button>
                        <button type="button" class="btn btn-success btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="change_status_up(id)">一鍵上架</a></button>
                        <button type="button" class="btn btn-danger btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="22.product_add.php">添加商品</a></button>
                        <button id="exportBtn" type="button" class="btn btn-secondary btn-sm">匯出csv表單</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>