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

<?php if ($pageName == 'add_order' || $pageName == 'edit_order') : ?>
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
                                <a class="nav-link <?= $pageName == 'order_list' ? 'active' : '' ?>" href="41.order_list.php">訂單列表</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'order_list' ? 'active' : '' ?>" href="41.order_list.php">商品列表</a>
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
                                <a class="nav-link color-strong <?= $pageName == 'order_list' ? 'active' : '' ?>" href="41.order_list.php">訂單列表</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'order_index' ? 'active' : '' ?>" href="40.order_index.php">訂單圖表統計</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'order_list' ? 'active' : '' ?>" href="41.order_list.php">訂單列表</a>
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
    <?php if ($pageName == 'order_list' || $pageName == 'normal-order_list') : ?>
        <div class="mx-1">
            <div class="card text-center mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-center">
                        <li class="nav-item me-5 mb-2">
                            <select id="orderTypeFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterOrders()">
                                <option selected disabled>篩選訂單類型</option>
                                <option value="全部">全部</option>
                                <option value="一般訂單">一般訂單</option>
                                <option value="以物易物">以物易物</option>
                                <option value="混合訂單">混合訂單</option>
                            </select>
                        </li>
                        <li class="nav-item me-5">
                            <select id="paymentFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterPayment()">
                                <option selected disabled>篩選付款狀態</option>
                                <option value="全部">全部</option>
                                <option value="已付款"><a href="">已付款</a></option>
                                <option value="尚未付款"><a href="">尚未付款</a></option>
                            </select>
                        </li>
                        <li class="nav-item me-5">
                            <select id="shipmentFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterShipment()">
                                <option selected disabled>篩選運送狀態</option>
                                <option value="全部">全部</option>
                                <option value="已寄出"><a href="">已寄出</a></option>
                                <option value="尚未寄出"><a href="">尚未寄出</a></option>
                            </select>
                        </li>
                        <li class="nav-item me-5">
                            <select id="statusFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterStatus()">
                                <option selected disabled>篩選訂單完成狀態</option>
                                <option value="全部">全部</option>
                                <option value="已完成"><a href="">已完成</a></option>
                                <option value="進行中"><a href="">進行中</a></option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="mt-1 d-flex justify-content-between">
                    <div class="input-group-sm d-flex ms-2">
                        <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="搜尋訂單類別">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchProd()">
                            搜尋訂單
                        </button>
                        <div class="d-flex align-item-center p-1">
                            <a href="41.order_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>

                    <div class="input-group-sm d-flex justify-content-end me-3">
                        <input id="minPrice" type="number" name="low" class="rounded-start ps-1" placeholder="輸入最低價格">
                        <input id="maxPrice" type="number" name="high" class="ps-1" placeholder="輸入最高價格">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchPrice()">
                            搜尋訂單總價格
                        </button>
                        <div class="d-flex align-item-center  p-1">
                            <a href="41.order_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <div class="d-flex justify-content-start my-1 mx-2">
                        <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="42.order_add.php">添加商品</a></button>
                        <button id="importBtn" type="button" class="btn btn-secondary btn-sm me-2">批次匯入CSV</button>
                        <button id="exportBtn" type="button" class="btn btn-secondary btn-sm me-2">匯出csv表單</button>
                        <button type="button" class="btn btn-danger btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>