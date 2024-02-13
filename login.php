<?php
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '登入';
$pageName = 'login';

?>

<?php include __DIR__ . '/0.parts/html-head.php' ?>
<style>
  form .mb-3 .form-text {
    color: red;
  }

  .card-width {
    width: 500px;
  }

  .bg-img {
    background-image: url(./02.imgs/bg.png);
    background-size: cover;
  }

  .addHeight {
    height: 80px;
  }
</style>
<div class="container-fluid px-0 mx-0 bg-img">
  <?php include __DIR__ . '/0.parts/navbar_register.php' ?>
  <div class="row addHeight"></div>
  <div class="row">
    <div class="col">
      <div class="card card-width mx-auto">
        <div class="card-body">
          <h5 class="card-title">登入</h5>
          <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
            <div class="mb-3">
              <label for="email" class="form-label">電子郵箱</label>
              <input type="text" class="form-control" id="email" name="email">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">密碼</label>
              <input type="password" class="form-control" id="password" name="password">
              <div class="form-text"></div>
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for failure-->
<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">登入失敗</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert" id="failureInfo">
          帳號或密碼錯誤
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>


<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
  const {
    email: emailEl,
    password: passwordEl,
  } = document.form1;

  const fields = [emailEl, passwordEl];

  function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function validatePassword(password) {
    const re = /^(?=.*\d)(?=.*[A-z])[\da-zA-Z]{6,16}$/;
    return re.test(password);
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

    if (!validateEmail(emailEl.value)) {
      isPass = false;
      emailEl.style.border = '1px solid red';
      emailEl.nextElementSibling.innerHTML = '請填寫正確的 Email !';
    }

    if (passwordEl.value && !validatePassword(passwordEl.value)) {
      isPass = false; // 沒有通過檢查
      passwordEl.style.border = '1px solid red';
      passwordEl.nextElementSibling.innerHTML = '請填寫正確的密碼!';
    }

    // 有通過檢查才發送表單
    if (isPass) {
      const fd = new FormData(document.form1); // 沒有外觀的表單物件

      fetch(`login-api.php`, {
        method: 'POST',
        body: fd,
      }).then(r => r.json()).then(data => {
        console.log(data);

        if (data.code === 700) {
          //登入成功且使用者是管理員
          location.href = 'index_main.php';
        } else {
          // 使用者是一般使用者
          if (data.code === 600) {
            location.href = 'index_main-no-admin.php';
          } else {
            failureModal.show();
          }
          failureModal.show();
        }
      })
    }
    // 地址: 兩層選單的參考
    // https://dennykuo.github.io/tw-city-selector/#/

  }

  const failureModal = new bootstrap.Modal('#failureModal');
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>