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
                <a class="nav-link color-strong" href="32.main-category_list.php">商品主分類列表</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="#">USER MODE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link color-strong" href="32.main-category_list.php">商品主分類列表</a>
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
                <a class="nav-link color-strong" href="32.main-category_list.php">商品主分類列表</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="#">USER MODE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link color-strong" href="32.main-category_list.php">商品主分類列表</a>
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
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category' ? 'true' : '' ?>" href="32.sub-category_list-admin.php">所有商品</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_free' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_free' ? 'true' : '' ?>" href="32.sub-category_list-admin_1A.php">免費禮物</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_computer' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_computer' ? 'true' : '' ?>" href="32.sub-category_list-admin_2C.php">電腦科技</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_phone' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_phone' ? 'true' : '' ?>" href="32.sub-category_list-admin_3C.php">手機配件</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_man' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_man' ? 'true' : '' ?>" href="32.sub-category_list-admin_4M.php">男裝服飾</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_woman' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_woman' ? 'true' : '' ?>" href="32.sub-category_list-admin_5W.php">女裝服飾</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_beauty' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_beauty' ? 'true' : '' ?>" href="32.sub-category_list-admin_6B.php">美妝保養</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_luxury' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_luxury' ? 'true' : '' ?>" href="32.sub-category_list-admin_7L.php">名牌精品</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_game' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_game' ? 'true' : '' ?>" href="32.sub-category_list-admin_8G.php">電玩遊戲</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_earphone' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_earphone' ? 'true' : '' ?>" href="32.sub-category_list-admin_9E.php">耳機錄音</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_camera' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_camera' ? 'true' : '' ?>" href="32.sub-category_list-admin_10C.php">相機拍攝</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_home' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_home' ? 'true' : '' ?>" href="32.sub-category_list-admin_11F.php">家具家居</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_electric' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_electric' ? 'true' : '' ?>" href="32.sub-category_list-admin_12T.php">電視電器</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_baby' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_baby' ? 'true' : '' ?>" href="32.sub-category_list-admin_13B.php">嬰兒孩童</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_health' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_health' ? 'true' : '' ?>" href="32.sub-category_list-admin_14N.php">健康營養品</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_sport' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_sport' ? 'true' : '' ?>" href="32.sub-category_list-admin_15S.php">運動用品</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_fodri' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_fodri' ? 'true' : '' ?>" href="32.sub-category_list-admin_16F.php">食物飲料</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_pet' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_pet' ? 'true' : '' ?>" href="32.sub-category_list-admin_17P.php">寵物用品</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_ticket' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_ticket' ? 'true' : '' ?>" href="32.sub-category_list-admin_18T.php">門票票券</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_car' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_car' ? 'true' : '' ?>" href="32.sub-category_list-admin_19C.php">機車汽車</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'sub-category_others' ? 'active' : '' ?>" aria-current="<?= $pageName == 'sub-category_others' ? 'true' : '' ?>" href="32.sub-category_list-admin_20O.php">其他其他</a>
          </li>
        </ul>
      </div>
      <div class="mt-1 d-flex justify-content-start mb-1">
        <div class="input-group-sm d-flex ms-2 me-2">
          <input id="searchInput" type="text" class="rounded-start ps-1" placeholder="搜尋主分類關鍵字">
          <button class="btn btn-outline-secondary btn-sm" type="button" onclick="searchProd()">
            搜尋分類
          </button>
        </div>
        <button type="button" class="btn btn-info me-2 btn-sm"><a class="color-a text-decoration-none" href="33.main-category_add.php">添加主分類</a></button>
        <button type="button" class="btn btn-danger btn-sm"><a class="color-a text-decoration-none" href="javascript:void(0);" onclick="delete_moreThenOne()">一鍵刪除</a></button>
      </div>
    </div>
  </div>
<?php endif; ?>