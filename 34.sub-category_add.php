<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '新增商品子分類';
$pageName = 'add_sub-category';


?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
  <?php include __DIR__ . '/0.parts/navbar.30_sub-category.php' ?>
  <style>
    form .mb-3 .form-text {
      color: red;
    }
  </style>
  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">新增商品子分類</h5>
            <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
              <div class="mb-3">
                <label for="sub" class="form-label">*子分類名稱</label>
                <input type="text" class="form-control" id="sub" name="sub" required>
                <div class="form-text"></div>
              </div>
              <div class="mb-3">
                <label for="main_catgory" class="form-label">*所屬主分類代碼</label>
                <input type="text" class="form-control" id="main_category" name="main_category" required>
                <div class=" form-text">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">新增</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for success-->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">新增結果</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-success" role="alert">
          資料新增成功
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
        <a href="32.sub-category_list.php" class="btn btn-primary">回到列表頁</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal for failure-->
<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">新增失敗</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert" id="failureInfo">
          資料新增失敗
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
        <a href="32.sub-category_list.php" class="btn btn-primary">回到列表頁</a>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
  const {
    sub: subEl,
    main_category: main_categoryEl,
  } = document.form1;

  const fields = [subEl, main_categoryEl];

  function validateSub(sub) {
    const re = /^[a-zA-Z0-9\s.,-]{1,20}$/;
    return re.test(sub);
  }

  function validateMC(main_category) {
    const re = /^[0-9]+$/;
    return re.test(main_category);
  }

  function sendData(e) {
    // 回復欄位的外觀
    for (let el of fields) {
      el.style.border = '1px solid #CCC';
      el.nextElementSibling.innerHTML = '';
    }

    e.preventDefault(); // 不要讓表單以傳統的方式送出
    let isPass = true; // 整個表單有沒有通過檢查

    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if (subEl.value.length < 1 && !validateSub(sub)) {
      isPass = false; // 沒有通過檢查
      subEl.style.border = '1px solid red';
      subEl.nextElementSibling.innerHTML = '請填寫正確的名稱!';
    }

    if (main_categoryEl.value.length < 1 && !validateMC(main_category)) {
      isPass = false;
      main_categoryEl.style.border = '1px solid red';
      main_categoryEl.nextElementSibling.innerHTML = '請填寫正確的主分類編號';
    }

    // 有通過檢查才發送表單
    if (isPass) {
      const fd = new FormData(document.form1); // 沒有外觀的表單物件

      fetch(`34.sub-category_add-api.php`, {
        method: 'POST',
        body: fd,
      }).then(r => r.json()).then(data => {
        console.log(data);

        if (data.success) {
          successModal.show();
        } else {
          document.querySelector('#failureInfo').innerHTML = data.error;
          failureModal.show();
        }
      })
    }
    // 地址: 兩層選單的參考
    // https://dennykuo.github.io/tw-city-selector/#/

  }
  const successModal = new bootstrap.Modal('#successModal');
  const failureModal = new bootstrap.Modal('#failureModal');
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>