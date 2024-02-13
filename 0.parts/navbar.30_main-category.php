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

<?php if ($pageName == 'add_main-category' || $pageName == 'edit_main-category') : ?>
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
                <a class="nav-link color-strong" href="31.main-category_list.php">商品主分類列表</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="#">USER MODE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link color-strong" href="31.main-category_list.php">商品主分類列表</a>
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
                <a class="nav-link color-strong" href="31.main-category_list.php">商品主分類列表</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="#">USER MODE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link color-strong" href="31.main-category_list.php">商品主分類列表</a>
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

  <div class="mx-1">
    <div class="card text-center mt-3">
      <div class="card-header mt-1 d-flex justify-content-start mb-1">
        <div class="input-group-sm d-flex ms-2 me-2">
          <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="搜尋主分類關鍵字">
          <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchProd()">
            搜尋分類
          </button>
          <div class="d-flex align-item-center p-1">
            <a href="31.main-category_list.php" title="刷新頁面">
              <i class="fa-solid fa-rotate-left"></i>
            </a>
          </div>
        </div>
        <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="33.main-category_add.php">添加主分類</a></button>
        <button id="importBtn" type="button" class="btn btn-secondary btn-sm me-2">批次匯入CSV</button>
        <button id="exportBtn" type="button" class="btn btn-secondary btn-sm me-2">匯出csv表單</button>
        <button type="button" class="btn btn-danger btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
      </div>
    </div>
  </div>
<?php endif; ?>