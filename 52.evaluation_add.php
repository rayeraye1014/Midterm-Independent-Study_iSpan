<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '新增評價';
$pageName = 'add_evaluation';

$order = "SELECT * FROM orders";
$stmt4 = $pdo->query($order);
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$evaluation = "SELECT evaluations.id, order_type, order_id, buyer_id, rating, comments, evaluation_date FROM evaluations JOIN orders ON evaluations.order_id = orders.id";
$stmt = $pdo->query($evaluation);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.50_evaluation.php' ?>
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
                        <h5 class="card-title">新增評價</h5>
                        <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
                            <div class="mb-3">
                                <label for="orderId" class="form-label">*訂單編號</label>
                                <select class="form-select" aria-label="Default select example" id="orderId" name="orderId">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <?php foreach ($rows4 as $r4) : ?>
                                        <option value="<?= $r4['id'] ?>"><?= $r4['id'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="orderType" class="form-label">*訂單類型</label>
                                <select class="form-select" aria-label="Default select example" id="orderType" name="orderType">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="buyer" class="form-label">*買家編號</label>
                                <select class="form-select" aria-label="Default select example" id="buyer" name="buyer">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">*評分分數</label>
                                <select class="form-select" aria-label="Default select example" id="rating" name="rating">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">評論</label>
                                <textarea class="form-control" name="comment" id="comment" cols="30" rows="5"></textarea>
                                <div id="charCount" class="form-text ms-2"></div>
                            </div>
                            <div class="mb-3">
                                <label for="createdT" class="form-label">評價建立時間</label>
                                <input type="text" class="form-control" name="createdT" id="createdT" placeholder="" readonly>
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
                    評價新增成功
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="51.evaluation_list.php" class="btn btn-primary">回到列表頁</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for failure-->
<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">新增結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="failureInfo">
                    評價新增失敗
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="51.evaluation_list.php" class="btn btn-primary">回到列表頁</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    // 獲取評價和訂單的數據
    var evaluation = <?= json_encode($rows) ?>;
    var order = <?= json_encode($rows4) ?>;

    // 當訂單編號選擇變化時，更新訂單類型 & 買家編號選單
    document.getElementById('orderId').addEventListener('change', function() {
        let selectedOrderId = this.value;
        let typeSelect = document.getElementById('orderType');
        let buyerSelect = document.getElementById('buyer');

        // 清空訂單類型 & 買家編號選單
        typeSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
        buyerSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';

        // 遍歷訂單數據，僅添加與訂單編號相符的訂單類型
        order.forEach(function(all) {
            if (all.id == selectedOrderId) {
                var option = document.createElement('option');
                option.value = all.order_type;
                option.text = all.order_type;
                typeSelect.add(option);

                var option2 = document.createElement('option');
                option2.value = all.buyer_id;
                option2.text = all.buyer_id;
                buyerSelect.add(option2);
            }
        });

    });

    document.addEventListener('DOMContentLoaded', function() {
        // 獲取當前時間
        var currentTime = new Date();

        // 格式化時間成 YYYY-MM-DD HH:MM:SS
        var formattedTime = currentTime.getFullYear() + '-' +
            ('0' + (currentTime.getMonth() + 1)).slice(-2) + '-' +
            ('0' + currentTime.getDate()).slice(-2) + ' ' +
            ('0' + currentTime.getHours()).slice(-2) + ':' +
            ('0' + currentTime.getMinutes()).slice(-2) + ':' +
            ('0' + currentTime.getSeconds()).slice(-2);

        // 將格式化後的時間設置到 input 的值中
        document.getElementById('createdT').value = formattedTime;
    });

    document.getElementById('comment').addEventListener('input', function() {
        //取得textarea中的內容
        let text = this.value;

        //計算字數
        let charCount = text.length;

        //限制字數為500字
        if (charCount > 500) {
            //截斷多餘的字元
            text = text.substring(0, 500);

            //更新textarea的值
            this.value = text;

            //更新字數
            charCount = 500;
        }

        //顯示字數
        document.getElementById('charCount').textContent = "字數" + charCount + "/500";
    })

    const {
        orderId: orderIdEl,
        orderType: orderTypeEl,
        buyer: buyerEl,
        rating: ratingEl,
        comment: commentEl,
        createdT: createdTEl,
    } = document.form1;

    const fields = [orderIdEl, orderTypeEl, buyerEl, ratingEl, commentEl, createdTEl, ];


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

        if (orderIdEl.value && orderIdEl.value == 'disabled') {
            isPass = false; // 沒有通過檢查
            orderIdEl.style.border = '1px solid red';
            orderIdEl.nextElementSibling.innerHTML = '請選擇訂單編號!';
        }

        if (orderTypeEl.value && orderTypeEl.value == 'disabled') {
            isPass = false; // 沒有通過檢查
            orderTypeEl.style.border = '1px solid red';
            orderTypeEl.nextElementSibling.innerHTML = '請選擇訂單類型!';
        }

        if (buyerEl.value && buyerEl.value == 'disabled') {
            isPass = false; // 沒有通過檢查
            buyerEl.style.border = '1px solid red';
            buyerEl.nextElementSibling.innerHTML = '請選擇買家編號!';
        }

        if (ratingEl.value && ratingEl.value == 'disabled') {
            isPass = false; // 沒有通過檢查
            ratingEl.style.border = '1px solid red';
            ratingEl.nextElementSibling.innerHTML = '請選擇評分分數!';
        }

        if (commentEl.value.length > 300) {
            isPass = false; // 沒有通過檢查
            commentEl.style.borderColor = '1px solid red';
            commentEl.nextElementSibling.innerHTML = '評論字數不得超過300字!';
        }

        // 有通過檢查才發送表單
        if (isPass) {
            const fd = new FormData(document.form1); // 沒有外觀的表單物件

            fetch(`52.evaluation_add-api.php`, {
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