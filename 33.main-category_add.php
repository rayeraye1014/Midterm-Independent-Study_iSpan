<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '新增商品主分類';
$pageName = 'add_main-category';


?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
  <?php include __DIR__ . '/0.parts/navbar.30_main-category.php' ?>
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
            <h5 class="card-title">新增商品主分類</h5>
            <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
              <div class="mb-3">
                <label for="main" class="form-label">*主分類名稱</label>
                <input type="text" class="form-control" id="main" name="main" require>
                <div class="form-text"></div>
              </div>
              <div class="mb-3">
                <label for="carbon_points_available" class="form-label">*此分類可獲得小碳點數</label>
                <input type="text" class="form-control" id="carbon_points_available" name="carbon_points_available">
                <div class="form-text"></div>
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
        <a href="31.main-category_list-admin.php" class="btn btn-primary">回到列表頁</a>
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
        <a href="31.main-category_list" class="btn btn-primary">回到列表頁</a>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
  const {
    main: mainEl,
    carbon_points_available: carbon_points_availableEl,
  } = document.form1;

  const fields = [mainEl, carbon_points_availableEl];

  function validateTitle(main) {
    const re = /^[a-zA-Z0-9\s.,-]{1,20}$/;
    return re.test(main);
  }

  function validateACP(carbon_points_available) {
    const re = /^[0-9]+$/;
    return re.test(carbon_points_available);
  }

  function sendData(e) {
    // 回復欄位的外觀
    for (let el of fields) {
      el.style.border = '1px solid #CCC';
      el.nextElementSibling.innerHTML = '';
    }
    /*nameEl.style.border = '1px solid #CCC';
    nameEl.nextElementSibling.innerHTML = '';
    emailEl.style.border = '1px solid #CCC';
    emailEl.nextElementSibling.innerHTML = '';
    mobileEl.style.border = '1px solid #CCC';
    mobileEl.nextElementSibling.innerHTML = '';*/ //這段改寫成上面的for迴圈

    e.preventDefault(); // 不要讓表單以傳統的方式送出
    let isPass = true; // 整個表單有沒有通過檢查

    // TODO: 檢查各個欄位的資料, 有沒有符合規定

    if (mainEl.value.length < 1 || mainEl.value.length > 100) {
      isPass = false; // 沒有通過檢查
      mainEl.style.border = '1px solid red';
      mainEl.nextElementSibling.innerHTML = '請填寫正確的名稱或字數超出限制(10)!';
    }

    if (carbon_points_availableEl.value < 1 || isNaN(carbon_points_availableEl.value)) {
      isPass = false;
      carbon_points_availableEl.style.border = '1px solid red';
      carbon_points_availableEl.nextElementSibling.innerHTML = '請填寫正確的數值!';
    }

    // 有通過檢查才發送表單
    if (isPass) {
      const fd = new FormData(document.form1); // 沒有外觀的表單物件

      fetch(`33.main-category_add-api.php`, {
        method: 'POST',
        body: fd,
      }).then(r => r.json()).then(data => {
        console.log(data);
        /*
        if (data.success) {
          alert('資料新增成功');
          location.href = 'list.php';
        } else {
          alert('資料新增沒有成功\n' + data.error);
        }
        */
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