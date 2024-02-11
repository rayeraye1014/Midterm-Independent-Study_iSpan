<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '編輯優惠券';
$pageName = 'edit_coupon';

$coupon = "SELECT * FROM coupon";
$stmt = $pdo->query($coupon);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (empty($id)) {
    header('Location: 61.coupon_list.php');
    exit;
}

$sql = "SELECT * FROM coupon WHERE coupon.id=$id";
$r = $pdo->query($sql)->fetch();
if (empty($r)) {
    header('Location: 61.coupon_list.php');
    exit;
}

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.60_coupon.php' ?>
    <style>
        form .mb-3 .form-text {
            color: red;
        }

        .my-card>img {
            width: 500px;
        }

        .overflow-auto {
            height: 1100px;
        }
    </style>
    <div class="container mt-3 overflow-auto">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">編輯優惠券</h5>
                        <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
                            <input type="hidden" name="id" value="<?= $r['id'] ?>">
                            <div class="mb-3">
                                <label for="couponType" class="form-label">*優惠券類別</label>
                                <select class="form-select" aria-label="Default select example" id="couponType" name="couponType">
                                    <option value="disabled" disabled>請選擇選項</option>
                                    <option value="免運券" <?= $r['coupon_type'] == '免運券' ? 'selected' : '' ?>>免運券</option>
                                    <option value="運費半價券" <?= $r['coupon_type'] == '運費半價券' ? 'selected' : '' ?>>運費半價券</option>
                                    <option value="折價券" <?= $r['coupon_type'] == '折價券' ? 'selected' : '' ?>>折價券</option>
                                    <option value="折扣券" <?= $r['coupon_type'] == '折扣券' ? 'selected' : '' ?>>折扣券</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="couponName" class="form-label">*優惠券名稱</label>
                                <input type="text" class="form-control" id="couponName" name="couponName" value="<?= $r['coupon_name'] ?>">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="couponDiscount" class="form-label">*優惠券折扣</label>
                                <input type="text" class="form-control" id="couponDiscount" name="couponDiscount" value="<?= $r['coupon_discount'] ?>">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="startDate" class="form-label">*開始日期</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" value="<?= $r['start_date'] ?>">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">*結束日期</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" value="<?= $r['vaild_date'] ?>">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="couponStatus" class="form-label">*優惠券狀態</label>
                                <select class="form-select" aria-label="Default select example" id="couponStatus" name="couponStatus">
                                    <option value="disabled" disabled>請選擇選項</option>
                                    <option value="已過期" <?= $r['coupon_status'] == '已過期' ? 'selected' : '' ?>>已過期</option>
                                    <option value="進行中" <?= $r['coupon_status'] == '進行中' ? 'selected' : '' ?>>進行中</option>
                                    <option value="未開始" <?= $r['coupon_status'] == '未開始' ? 'selected' : '' ?>>未開始</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">修改</button>
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
                <h1 class="modal-title fs-5">編輯結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    優惠券內容編輯成功
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="61.coupon_list.php" class="btn btn-primary">回到列表頁</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for failure-->
<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">編輯結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="failureInfo">
                    優惠券內容無修改
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="61.coupon_list.php" class="btn btn-primary">回到列表頁</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    document.getElementById('startDate').addEventListener('change', function() {
        document.getElementById('endDate').addEventListener('change', function() {
            let now = new Date();
            let startDate = new Date(document.getElementById('startDate').value);
            let endDate = new Date(document.getElementById('endDate').value);
            let couponStatus = document.getElementById('couponStatus');

            // 清空
            couponStatus.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';

            if (endDate < now) {
                var option = document.createElement('option');
                option.value = '已過期';
                option.text = '已過期';
                couponStatus.add(option);
            } else if (startDate < now && now < endDate) {
                var option2 = document.createElement('option');
                option2.value = '進行中';
                option2.text = '進行中';
                couponStatus.add(option2);
            } else {
                var option3 = document.createElement('option');
                option3.value = '未開始';
                option3.text = '未開始';
                couponStatus.add(option3);
            };
        })
    })

    const {
        couponType: couponTypeEl,
        couponName: couponNameEl,
        couponDiscount: couponDiscountEl,
        startDate: startDateEl,
        endDate: endDateEl,
        couponStatus: couponStatusEl,
    } = document.form1;

    const fields = [couponTypeEl, couponNameEl, couponDiscountEl, startDateEl, endDateEl, couponStatusEl, ];

    function validateCouponDiscount(couponDiscount) {
        const re = /^(-[\d]+|(\d{1,2}|100)%)$/;
        return re.test(couponDiscount);
    }

    function sendData(e) {
        // 回復欄位的外觀
        for (let el of fields) {
            if (el) {
                el.style.border = '1px solid #CCC';
                el.nextElementSibling.innerHTML = '';
            }
        }

        e.preventDefault(); // 不要讓表單以傳統的方式送出
        let isPass = true; // 整個表單有沒有通過檢查

        if (couponTypeEl.value && couponTypeEl.value == 'disabled') {
            isPass = false; // 沒有通過檢查
            couponTypeEl.style.border = '1px solid red';
            couponTypeEl.nextElementSibling.innerHTML = '請選擇優惠券類別!';
        }

        if (couponNameEl.value.length < 1) {
            isPass = false; // 沒有通過檢查
            couponNameEl.style.border = '1px solid red';
            couponNameEl.nextElementSibling.innerHTML = '請輸入優惠券名稱!';
        }

        if (couponDiscountEl.value && !validateCouponDiscount(couponDiscountEl.value)) {
            isPass = false; // 沒有通過檢查
            couponDiscountEl.style.border = '1px solid red';
            couponDiscountEl.nextElementSibling.innerHTML = '請輸入(數值+"%")或是("-"+數值)!';
        }

        if (couponStatusEl.value && couponStatusEl.value == 'disabled') {
            isPass = false; // 沒有通過檢查
            couponStatusEl.style.border = '1px solid red';
            couponStatusEl.nextElementSibling.innerHTML = '請選擇優惠券狀態!';
        }



        // 有通過檢查才發送表單
        if (isPass) {
            const fd = new FormData(document.form1); // 沒有外觀的表單物件

            fetch(`64.coupon_edit-api.php`, {
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