<?php
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '註冊會員';
$pageName = 'register';

123
?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar_registering.php' ?>
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
                        <h5 class="card-title">註冊會員資料</h5>
                        <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
                            <div class="mb-3">
                                <label for="email" class="form-label">*電子郵箱</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">*密碼</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">*確認密碼</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">*手機</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">地址</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="birthday" class="form-label">生日</label>
                                <input type="date" class="form-control" id="birthday" name="birthday">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="nickname" class="form-label">暱稱</label>
                                <input type="text" class="form-control" id="nickname" name="nickname">
                                <div class="form-text"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">送出註冊申請</button>
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
                <h1 class="modal-title fs-5">註冊結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    註冊成功
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="login.php" class="btn btn-primary">登入</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for failure-->
<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">註冊結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="failureInfo">
                    註冊失敗
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="register.php" class="btn btn-primary">重新註冊</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    const {
        email: emailEl,
        password: passwordEl,
        password2: password2El,
        mobile: mobileEl,
        address: addressEl,
        birthday: birthdayEl,
        nickname: nicknameEl,
    } = document.form1;

    const fields = [emailEl, passwordEl, password2El, mobileEl, addressEl, birthdayEl, nicknameEl, ];

    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validatePassword(password) {
        const re = /^(?=.*\d)(?=.*[A-z])[\da-zA-Z]{6,16}$/;
        return re.test(password);
    }

    function validateMobile(mobile) {
        const re = /^09\d{2}-?\d{3}-?\d{3}$/;
        return re.test(mobile);
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

        if (emailEl.value && !validateEmail(emailEl.value)) {
            isPass = false;
            emailEl.style.border = '1px solid red';
            emailEl.nextElementSibling.innerHTML = '請填寫正確的Email !';
        }

        if (passwordEl.value && !validatePassword(passwordEl)) {
            isPass = false; // 沒有通過檢查
            passwordEl.style.border = '1px solid red';
            passwordEl.nextElementSibling.innerHTML = '請填寫正確的密碼!';
        }

        if (passwordEl.value !== password2El.value) {
            isPass = false; // 沒有通過檢查
            password2El.style.border = '1px solid red';
            password2El.nextElementSibling.innerHTML = '請確認填寫相同的密碼!';
        }

        if (mobileEl.value && !validateMobile(mobileEl.value)) {
            isPass = false;
            mobileEl.style.border = '1px solid red';
            mobileEl.nextElementSibling.innerHTML = '請填寫正確的手機號碼!';
        }

        // 有通過檢查才發送表單
        if (isPass) {
            const fd = new FormData(document.form1); // 沒有外觀的表單物件

            fetch(`register-api.php`, {
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

    }
    const successModal = new bootstrap.Modal('#successModal');
    const failureModal = new bootstrap.Modal('#failureModal');
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>