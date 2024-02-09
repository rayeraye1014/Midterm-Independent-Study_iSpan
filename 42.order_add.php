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
                                <label for="order-type" class="form-label">*訂單類型</label>
                                <select class="form-select" aria-label="Default select example" id="order-type" name="order-type">
                                    <option selected disabled>請選擇選項</option>
                                    <option value="一般訂單">一般訂單</option>
                                    <option value="混合訂單">混合訂單</option>
                                    <option value="以物易物">以物易物</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="seller" class="form-label">*賣家編號</label>
                                <select class="form-select" aria-label="Default select example" id="seller" name="seller">
                                    <option selected disabled>請選擇選項</option>
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
                                    <option selected disabled>請選擇選項</option>
                                    <option value="fwsg25256">fwsg25256</option>
                                    <option value="wsaf2256">wsaf2256</option>
                                    <option value="fehasg226">fehasg226</option>
                                    <option value="rgasdg2312">rgasdg2312</option>
                                    <option value="aaa123456">aaa123456</option>
                                    <option value="fwsg25256">fwsg25256</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="product-name" class="form-label">*商品名稱</label>
                                <select class="form-select" aria-label="Default select example" id="product-name" name="product-name">
                                    <option selected disabled>請選擇選項</option>
                                    <?php foreach ($rows4 as $r4) : ?>
                                        <option value="<?= $r4['id'] ?>"><?= $r4['product_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="form-label">*商品金額</label>
                                <select class="form-select" aria-label="Default select example" id="product-price" name="product-price">
                                    <option selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="shipment-fee" class="form-label">*運費</label>
                                <select class="form-select" aria-label="Default select example" id="shipment-fee" name="shipment-fee">
                                    <option selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="photos" class="form-label">*商品圖片</label>
                                <div class="card-container"></div>
                                <input type="file" class="form-control" id="photos" name="photos[]" multiple accept="image/*" onchange="uploadFile()">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">*商品名稱</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">*商品價格</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">*商品數量</label>
                                <input type="text" class="form-control" id="qty" name="qty" required>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="intro" class="form-label">商品介紹</label>
                                <textarea class="form-control" name="intro" id="intro" cols="30" rows="5"></textarea>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="carbonPoints" class="form-label">*可獲得小碳點數</label>
                                <select class="form-select" aria-label="Default select example" id="carbonPoints" name="carbonPoints">
                                    <option selected disabled>請選擇選項</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="createdT" class="form-label">商品建立時間</label>
                                <input type="text" class="form-control" name="createdT" id="createdT" placeholder="" readonly>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="editT" class="form-label">商品編輯時間</label>
                                <input type="text" class="form-control" name="editT" id="editT" placeholder="" readonly>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">*上架狀態</label>
                                <select class="form-select" aria-label="Default select example" id="status" name="status">
                                    <option selected disabled>請選擇選項</option>
                                    <option value="上架中">上架中</option>
                                    <option value="下架中">下架中</option>
                                </select>
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
                <a href="21.product_list.php" class="btn btn-primary">回到列表頁</a>
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
                <a href="21.product_list.php" class="btn btn-primary">回到列表頁</a>
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
    document.getElementById('product-name').addEventListener('change', function() {
        var selectedProductId = this.value;
        var priceSelect = document.getElementById('product-price');

        // 清空價格選單
        priceSelect.innerHTML = '<option selected disabled>請選擇選項</option>';

        // 遍歷產品數據，僅添加與所選產品相符的價格
        product.forEach(function(productItem) {
            if (productItem.id == selectedProductId) {
                let selectType = document.getElementById('order-type');
                if (selectType.value == '以物易物') {
                    var option = document.createElement('option');
                    option.value = 0;
                    option.text = 0;
                    priceSelect.add(option);
                } else if (selectType.value == '一般訂單' || selectType.value == '混合訂單') {
                    var option2 = document.createElement('option');
                    option2.value = productItem.product_price;
                    option2.text = productItem.product_price;
                    priceSelect.add(option2);
                }
            }
        });
    });


    const container = document.querySelector(".card-container");

    function uploadFile() {
        const container = document.querySelector(".card-container");
        const fileInput = document.getElementById('photos');

        //清空先前的card-container內容
        container.innerHTML = '';

        for (const file of fileInput.files) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewCard = document.createElement('div');
                previewCard.className = 'my-card';
                previewCard.innerHTML = `<img src="${e.target.result}" alt="Preview" />`;

                container.appendChild(previewCard);
            };

            reader.readAsDataURL(file);
        }
    }


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
        document.getElementById('editT').value = formattedTime;
    });

    const {
        seller: sellerEl,
        main: mainEl,
        sub: subEl,
        photos: photosEls,
        name: nameEl,
        price: priceEl,
        qty: qtyEl,
        intro: introEl,
        carbonPoints: carbonPointsEl,
        createdT: createdTEl,
        editT: editTEl,
        status: statusEl,
    } = document.form1;

    const fields = [sellerEl, mainEl, subEl, photosEls, nameEl, priceEl, qtyEl, introEl, carbonPointsEl, createdTEl, editTEl, statusEl];
    const photosValues = Array.from(photosEls.files).map((file) => file.name);

    function validatePrice(price) {
        const re = /^[0-9]+$/;
        return re.test(price);
    }

    function validateQty(qty) {
        const re = /^[0-9]+$/;
        return re.test(qty);
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

        // TODO: 檢查各個欄位的資料, 有沒有符合規定

        if (sellerEl.value == "") {
            isPass = false; // 沒有通過檢查
            sellerEl.style.border = '1px solid red';
            sellerEl.nextElementSibling.innerHTML = '請選擇上架者名稱!';
        }

        if (mainEl.value == "") {
            isPass = false; // 沒有通過檢查
            mainEl.style.border = '1px solid red';
            mainEl.nextElementSibling.innerHTML = '請選擇主分類選項!';
        }

        if (subEl.value == "") {
            isPass = false; // 沒有通過檢查
            subEl.style.border = '1px solid red';
            subEl.nextElementSibling.innerHTML = '請選擇子分類選項!';
        }

        if (photosEls.files.length === 0) {
            isPass = false; // 沒有通過檢查
            photosEls.style.border = '1px solid red';
            photosEls.nextElementSibling.innerHTML = '請至少上傳一張照片!';
        }

        if (nameEl.value == "") {
            isPass = false; // 沒有通過檢查
            nameEl.style.border = '1px solid red';
            nameEl.nextElementSibling.innerHTML = '請填入商品名稱或超過字數限制(60)!';
        }

        if (priceEl.value == "" && !validatePrice(priceEl.value)) {
            isPass = false; // 沒有通過檢查
            priceEl.style.border = '1px solid red';
            priceEl.nextElementSibling.innerHTML = '請填入正確商品價格!';
        }

        if (qtyEl.value == "" || !validateQty(qtyEl.value)) {
            isPass = false; // 沒有通過檢查
            qtyEl.style.border = '1px solid red';
            qtyEl.nextElementSibling.innerHTML = '請填入正確商品數量!';
        }

        if (carbonPointsEl.value == "") {
            isPass = false;
            carbon_pointsEl.style.border = '1px solid red';
            carbon_pointsEl.nextElementSibling.innerHTML = '請選擇小碳點數!';
        }

        if (statusEl.value == "") {
            isPass = false;
            statusEl.style.border = '1px solid red';
            statusEl.nextElementSibling.innerHTML = '請選擇上架狀態!';
        }

        // 有通過檢查才發送表單
        if (isPass) {
            const fd = new FormData(document.form1); // 沒有外觀的表單物件

            fetch(`22.product_add-api.php`, {
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