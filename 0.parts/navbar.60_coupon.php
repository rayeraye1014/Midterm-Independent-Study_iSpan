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

<?php if ($pageName == 'add_coupon' || $pageName == 'edit_coupon') : ?>
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
                                <a class="nav-link <?= $pageName == 'coupon_list' ? 'active' : '' ?>" href="61.coupon_list.php">優惠券列表</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'coupon_list' ? 'active' : '' ?>" href="61.coupon_list.php">優惠券列表</a>
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
                                <a class="nav-link color-strong <?= $pageName == 'coupon_list' ? 'active' : '' ?>" href="61.coupon_list.php">優惠券列表</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'coupon_index' ? 'active' : '' ?>" href="60.coupon_index.php">優惠券圖表統計</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'coupon_list' ? 'active' : '' ?>" href="61.coupon_list.php">優惠券列表</a>
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
    <?php if ($pageName == 'coupon_list') : ?>
        <div class="mx-1">
            <div class="card text-center mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs d-flex justify-content-center">
                        <li class="nav-item me-5 mb-2">
                            <select id="couponTypeFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterType()">
                                <option selected disabled>篩選優惠券類型</option>
                                <option value="全部">全部</option>
                                <option value="免運券">免運券</option>
                                <option value="運費半價券">運費半價券</option>
                                <option value="折扣券">折扣券</option>
                                <option value="折價券">折價券</option>
                            </select>
                        </li>
                        <li class="nav-item me-5">
                            <select id="statusFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterStatus()">
                                <option selected disabled>篩選評價分數</option>
                                <option value="全部">全部</option>
                                <option value="未開始">未開始</option>
                                <option value="進行中">進行中</option>
                                <option value="已過期">已過期</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="mt-2 d-flex justify-content-between">
                    <div class="input-group-sm d-flex ms-2">
                        <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="搜尋優惠券類別">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchType()">
                            搜尋類別
                        </button>
                        <div class="d-flex align-item-center p-1">
                            <a href="61.coupon_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>
                    <div class="input-group-sm d-flex justify-content-end me-3">
                        <input id="minDate" type="date" name="low" class="rounded-start ps-1" placeholder="選擇開始日期" value="">
                        <input id="maxDate" type="date" name="high" class="ps-1" placeholder="選擇結束日期" value="">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchDate()">
                            搜尋優惠券使用區間
                        </button>
                        <div class="d-flex align-item-center p-1">
                            <a href="61.coupon_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <div class="d-flex justify-content-start my-1 mx-2">
                        <div class="">
                            <button type="button" class="btn btn-danger btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
                        </div>
                        <div class="ms-3">
                            <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="62.coupon_add.php">添加評價</a></button>
                            <!--<button type="button" class="btn btn-info btn-sm"><a class="color-a text-decoration-none" href="file_excel-product.php">匯出Excel表單</a></button>-->
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>