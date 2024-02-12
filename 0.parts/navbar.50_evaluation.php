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

<?php if ($pageName == 'add_evaluation' || $pageName == 'edit_evaluation') : ?>
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
                                <a class="nav-link <?= $pageName == 'evaluation_list' ? 'active' : '' ?>" href="51.evaluation_list.php">評價列表</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'evaluation_list' ? 'active' : '' ?>" href="51.evaluation_list.php">評價列表</a>
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
                                <a class="nav-link color-strong <?= $pageName == 'evaluation_list' ? 'active' : '' ?>" href="51.evaluation_list.php">評價列表</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'evaluation_index' ? 'active' : '' ?>" href="50.evaluation_index.php">評價圖表統計</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'evaluation_list' ? 'active' : '' ?>" href="51.evaluation_list.php">評價列表</a>
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
    <?php if ($pageName == 'evaluation_list') : ?>
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
                            <select id="ratingFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterRating()">
                                <option selected disabled>篩選評價分數</option>
                                <option value="全部">全部</option>
                                <option value="5">評價5分</option>
                                <option value="4">評價4分</option>
                                <option value="3">評價3分</option>
                                <option value="2">評價2分</option>
                                <option value="1">評價1分</option>
                            </select>
                        </li>
                        <li class="nav-item me-5">
                            <select id="dateFilter" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="filterDate()">
                                <option selected disabled>篩選評論日期</option>
                                <option value="全部">全部</option>
                                <option value="2024">2024年</option>
                                <option value="2023">2023年</option>
                                <option value="2022">2022年</option>
                                <option value="2021">2021年</option>
                                <option value="2020">2020年</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="mt-2 d-flex justify-content-between">
                    <div class="input-group-sm d-flex ms-2">
                        <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="搜尋訂單類別">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchProd()">
                            搜尋類別
                        </button>
                        <div class="d-flex align-item-center p-1">
                            <a href="51.evaluation_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>

                    <div class="input-group-sm d-flex justify-content-end me-3">
                        <input id="minRating" type="number" name="low" class="rounded-start ps-1" placeholder="輸入最低評價分數">
                        <input id="maxRating" type="number" name="high" class="ps-1" placeholder="輸入最高評價分數">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchRating()">
                            搜尋評價分數區間
                        </button>
                        <div class="d-flex align-item-center  p-1">
                            <a href="51.evaluation_list.php">
                                <i class="fa-solid fa-rotate-left" title="刷新頁面"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <div class="d-flex justify-content-start my-1 mx-2">
                        <button type="button" class="btn btn-danger btn-sm me-2"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
                        <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="52.evaluation_add.php">添加評價</a></button>
                        <button id="exportBtn" type="button" class="btn btn-secondary btn-sm">匯出csv表單</button>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>