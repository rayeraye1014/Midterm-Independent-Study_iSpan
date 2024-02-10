<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '新增訂單';
$pageName = 'add_order';

$product = "SELECT * FROM products";
$stmt4 = $pdo->query($product);
$rows4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$order = "SELECT orders.id, order_type, orders.seller_id, buyer_id, product_id, shipment_fee, payment_status, shipment_status, order_date, complete_status, complete_date, product_name, product_price FROM orders JOIN products ON orders.product_id = products.id";
$stmt = $pdo->query($order);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.40_order.php' ?>
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
                        <h5 class="card-title">新增訂單</h5>
                        <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
                            <div class="mb-3">
                                <label for="orderType" class="form-label">*訂單類型</label>
                                <select class="form-select" aria-label="Default select example" id="orderType" name="orderType">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="一般訂單">一般訂單</option>
                                    <option value="混合訂單">混合訂單</option>
                                    <option value="以物易物">以物易物</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="seller" class="form-label">*賣家編號</label>
                                <select class="form-select" aria-label="Default select example" id="seller" name="seller">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="eragg98556">eragg98556</option>
                                    <option value="hr3gdsh333">hr3gdsh333</option>
                                    <option value="sdF35555">sdF35555</option>
                                    <option value="dfshh52225">dfshh52225</option>
                                    <option value="rg653213">rg653213</option>
                                    <option value="gsff55555">gsff55555</option>
                                    <option value="	efagrg8226"> efagrg8226</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="buyer" class="form-label">*買家編號</label>
                                <select class="form-select" aria-label="Default select example" id="buyer" name="buyer">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="fwsg25256">fwsg25256</option>
                                    <option value="wsaf2256">wsaf2256</option>
                                    <option value="fehasg226">fehasg226</option>
                                    <option value="rgasdg2312">rgasdg2312</option>
                                    <option value="aaa123456">aaa123456</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="productName" class="form-label">*商品名稱</label>
                                <select class="form-select" aria-label="Default select example" id="productName" name="productName">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <?php foreach ($rows4 as $r4) : ?>
                                        <option value="<?= $r4['id'] ?>"><?= $r4['product_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">*商品金額</label>
                                <select class="form-select" aria-label="Default select example" id="productPrice" name="productPrice">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="shipmentFee" class="form-label">*運費</label>
                                <select class="form-select" aria-label="Default select example" id="shipmentFee" name="shipmentFee">
                                    <option selected value="120">120</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="totalPrice" class="form-label">*總金額(含運費)</label>
                                <select class="form-select" aria-label="Default select example" id="totalPrice" name="totalPrice">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="payStatus" class="form-label">*付款狀態</label>
                                <select class="form-select" aria-label="Default select example" id="payStatus" name="payStatus">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="尚未付款">尚未付款</option>
                                    <option value="已付款">已付款</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="shipStatus" class="form-label">*運送狀態</label>
                                <select class="form-select" aria-label="Default select example" id="shipStatus" name="shipStatus">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="尚未寄出">尚未寄出</option>
                                    <option value="已寄出">已寄出</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="createdT" class="form-label">訂單建立時間</label>
                                <input type="text" class="form-control" name="createdT" id="createdT" placeholder="" readonly>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="orderStatus" class="form-label">*訂單完成狀態</label>
                                <select class="form-select" aria-label="Default select example" id="orderStatus" name="orderStatus">
                                    <option value="disabled" selected disabled>請選擇選項</option>
                                    <option value="進行中">進行中</option>
                                    <option value="已完成">已完成</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="completeD" class="form-label">訂單完成日期</label>
                                <input type="date" class="form-control" name="completeD" id="completeD" placeholder="">
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
                    訂單新增成功
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="41.order_list.php" class="btn btn-primary">回到列表頁</a>
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
                    訂單新增失敗
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                <a href="41.order_list.php" class="btn btn-primary">回到列表頁</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    // 獲取訂單和產品的數據
    var order = <?= json_encode($rows) ?>;
    var product = <?= json_encode($rows4) ?>;

    // 當產品選擇變化時，更新價格選單
    document.getElementById('productName').addEventListener('change', function() {
        let selectedProductId = this.value;
        let priceSelect = document.getElementById('productPrice');

        // 清空價格選單
        priceSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';

        // 遍歷產品數據，僅添加與所選訂單類型相符的單價和總價
        product.forEach(function(productItem) {
            if (productItem.id == selectedProductId) {
                let selectType = document.getElementById('orderType');
                let selectTotalP = document.getElementById('totalPrice');
                if (selectType.value == '以物易物') {
                    priceSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option = document.createElement('option');
                    option.value = 0;
                    option.text = 0;
                    priceSelect.add(option);

                    selectTotalP.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option3 = document.createElement('option');
                    option3.value = 120;
                    option3.text = 120;
                    selectTotalP.add(option3);
                } else if (selectType.value == '一般訂單' || selectType.value == '混合訂單') {
                    priceSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option2 = document.createElement('option');
                    option2.value = productItem.product_price;
                    option2.text = productItem.product_price;
                    priceSelect.add(option2);

                    selectTotalP.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option4 = document.createElement('option');
                    option4.value = productItem.product_price + 120;
                    option4.text = productItem.product_price + 120;
                    selectTotalP.add(option4);
                }
            }
        });
    });

    // 當訂單類型選擇變化時，更新價格選單
    document.getElementById('orderType').addEventListener('change', function() {
        let selectedProductId = this.value;
        let priceSelect = document.getElementById('productPrice');

        // 清空價格選單
        priceSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';

        // 遍歷產品數據，僅添加與所選訂單類型相符的單價和總價
        product.forEach(function(productItem) {
            if (productItem.id == selectedProductId) {
                let selectType = document.getElementById('orderType');
                let selectTotalP = document.getElementById('totalPrice');
                if (selectType.value == '以物易物') {
                    priceSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option = document.createElement('option');
                    option.value = 0;
                    option.text = 0;
                    priceSelect.add(option);

                    selectTotalP.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option3 = document.createElement('option');
                    option3.value = 120;
                    option3.text = 120;
                    selectTotalP.add(option3);
                } else if (selectType.value == '一般訂單' || selectType.value == '混合訂單') {
                    priceSelect.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option2 = document.createElement('option');
                    option2.value = productItem.product_price;
                    option2.text = productItem.product_price;
                    priceSelect.add(option2);

                    selectTotalP.innerHTML = '<option value="disabled" selected disabled>請選擇選項</option>';
                    let option4 = document.createElement('option');
                    option4.value = productItem.product_price + 120;
                    option4.text = productItem.product_price + 120;
                    selectTotalP.add(option4);
                }
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

    const {
        orderType: orderTypeEl,
        seller: sellerEl,
        buyer: buyerEl,
        productName: productNameEl,
        productPrice: productPriceEl,
        shipmemtFee: shipmentFeeEl,
        totalPrice: totalPriceEl,
        payStatus: payStatusEl,
        shipStatus: shipStatusEl,
        createdT: createdTEl,
        orderStatus: orderStatusEl,
        completeD: completeDEl,
    } = document.form1;

    const fields = [orderTypeEl, sellerEl, buyerEl, productNameEl, productPriceEl, shipmentFeeEl, totalPriceEl, payStatusEl, shipStatusEl, createdTEl, orderStatusEl, completeDEl, ];


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

        // TODO: 檢查各個欄位的資料, 有沒有符合規定
        if (orderTypeEl.value && orderTypeEl.value == "disabled") {
            isPass = false; // 沒有通過檢查
            orderTypeEl.style.border = '1px solid red';
            orderTypeEl.nextElementSibling.innerHTML = '請選擇訂單類型!';
        }

        if (sellerEl.value && sellerEl.value == "disabled") {
            isPass = false; // 沒有通過檢查
            sellerEl.style.border = '1px solid red';
            sellerEl.nextElementSibling.innerHTML = '請選擇賣家編號!';
        }

        if (buyerEl.value && buyerEl.value == "disabled") {
            isPass = false; // 沒有通過檢查
            buyerEl.style.border = '1px solid red';
            buyerEl.nextElementSibling.innerHTML = '請選擇買家編號!';
        }

        if (productNameEl.value && productNameEl.value == "disabled") {
            isPass = false; // 沒有通過檢查
            productNameEl.style.border = '1px solid red';
            productNameEl.nextElementSibling.innerHTML = '請選擇商品名稱!';
        }

        if (productPriceEl.value && productPriceEl.value == "disabled") {
            isPass = false; // 沒有通過檢查
            productPriceEl.style.border = '1px solid red';
            productPriceEl.nextElementSibling.innerHTML = '請選擇商品金額!';
        }

        if (totalPriceEl.value && totalPriceEl.value == "disabled") {
            isPass = false; // 沒有通過檢查
            totalPriceEl.style.border = '1px solid red';
            totalPriceEl.nextElementSibling.innerHTML = '請選擇商品總金額!';
        }

        if (payStatusEl.value && payStatusEl.value == "disabled") {
            isPass = false;
            payStatusEl.style.border = '1px solid red';
            payStatusEl.nextElementSibling.innerHTML = '請選擇付款狀態!';
        }

        if (payStatusEl.value == '尚未付款' && shipStatusEl.value == '已寄出') {
            isPass = false;
            shipStatusEl.style.border = '1px solid red';
            shipStatusEl.nextElementSibling.innerHTML = '尚未付款不可寄出!';
        }

        if (payStatusEl.value == '尚未付款' && orderStatusEl.value == '已完成') {
            isPass = false;
            orderStatusEl.style.border = '1px solid red';
            orderStatusEl.nextElementSibling.innerHTML = '尚未付款不可完成訂單!';
        }

        if (shipStatusEl.value == '尚未寄出' && orderStatusEl.value == '已完成') {
            isPass = false;
            orderStatusEl.style.border = '1px solid red';
            orderStatusEl.nextElementSibling.innerHTML = '尚未寄出商品不可完成訂單!';
        }

        if (shipStatusEl.value && shipStatusEl.value == "disabled") {
            isPass = false;
            shipStatusEl.style.border = '1px solid red';
            shipStatusEl.nextElementSibling.innerHTML = '請選擇運送狀態!';
        }

        if (orderStatusEl.value && orderStatusEl.value == "disabled") {
            isPass = false;
            orderStatusEl.style.border = '1px solid red';
            orderStatusEl.nextElementSibling.innerHTML = '請選擇訂單狀態!';
        }

        if (orderStatusEl.value == '已完成' && !completeDEl.value) {
            isPass = false;
            completeDEl.style.border = '1px solid red';
            completeDEl.nextElementSibling.innerHTML = '請選擇訂單完成日期!';
        }


        // 有通過檢查才發送表單
        if (isPass) {
            const fd = new FormData(document.form1); // 沒有外觀的表單物件

            fetch(`42.order_add-api.php`, {
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