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
<?php if ($pageName == 'add' || $pageName == 'edit') : ?>
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
                                <a class="nav-link color-strong" href="01.member_list.php">會員列表</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageName == 'product_list' ? 'active' : '' ?>" href="01.member_list.php">會員列表</a>
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
                                <a class="nav-link color-strong <?= $pageName == 'list' ? 'active' : '' ?>" href="01.member_list.php">會員列表</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong <?= $pageName == 'member_index' ? 'active' : '' ?>" href="10.member_index.php">會員圖表統計</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">USER MODE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-strong" href="01.member_list.php">會員列表</a>
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

    <?php if ($pageName == 'list') : ?>
        <div class="mx-1">
            <div class="card text-center mt-3">
                <div class="card-header">
                    <div class="mt-1 d-flex justify-content-start mb-1">
                        <div class="input-group-sm d-flex me-2">
                            <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="輸入搜尋關鍵字">
                            <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchAddress()">
                                搜尋地址
                            </button>
                            <div class="d-flex align-item-center p-1"><a href="01.member_list.php"><i class="fa-solid fa-rotate-left"></i></a></div>
                        </div>
                        <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="02.member_add.php">新增會員資料</a></button>
                        <button type="button" class="btn btn-danger btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>