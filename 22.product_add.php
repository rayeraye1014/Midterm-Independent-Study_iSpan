<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '新增商品';
$pageName = 'add_product';

$category_main = "SELECT * FROM categories_main";
$stmt2 = $pdo->query($category_main);
$rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$category_sub = "SELECT * FROM categories_sub";
$stmt = $pdo->query($category_sub);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.20_product.php' ?>
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
                        <h5 class="card-title">新增商品</h5>
                        <form name="form1" onsubmit="sendData(event)"> <!-- 因為有下onsubmit，故action和methon就沒有用處了，可以刪除 -->
                            <div class="mb-3">
                                <label for="seller" class="form-label">*上架者</label>
                                <select class="form-select" aria-label="Default select example" id="seller" name="seller">
                                    <option selected disabled>請選擇選項</option>
                                    <option value="ellie12345">ellie12345</option>
                                    <option value="ken222222">ken222222</option>
                                    <option value="amy333333">amy333333</option>
                                    <option value="lily44444">lily44444</option>
                                    <option value="wu5555555">wu5555555</option>
                                    <option value="jj6666666">jj6666666</option>
                                    <option value="kyle77777">kyle77777</option>
                                    <option value="pp888888">pp888888</option>
                                    <option value="fl1234561">fl1234561</option>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="main" class="form-label">*商品主分類</label>
                                <select class="form-select" aria-label="Default select example" id="main" name="main">
                                    <option selected disabled>請選擇選項</option>
                                    <?php foreach ($rows2 as $r2) : ?>
                                        <option value="<?= $r2['id'] ?>"><?= $r2['main'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="sub" class="form-label">*商品子分類</label>
                                <select class="form-select" aria-label="Default select example" id="sub" name="sub">
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
    // 獲取主分類和子分類的數據
    var mainCategories = <?= json_encode($rows2) ?>;
    var subCategories = <?= json_encode($rows) ?>;

    // 當主分類選擇變化時，更新子分類選單
    document.getElementById('main').addEventListener('change', function() {
        var selectedMainCategoryId = this.value;
        var subSelect = document.getElementById('sub');

        // 清空子分類選單
        subSelect.innerHTML = '<option selected disabled>請選擇選項</option>';

        // 遍歷子分類數據，僅添加與所選主分類相符的子分類
        subCategories.forEach(function(sub) {
            if (sub.main_category == selectedMainCategoryId) {
                var option = document.createElement('option');
                option.value = sub.sub;
                option.text = sub.sub;
                subSelect.add(option);
            }
        });
    });

    // 當主分類選擇變化時，更新小碳點選單
    document.getElementById('main').addEventListener('change', function() {
        var selectedMainCategoryId = this.value;
        var cpSelect = document.getElementById('carbonPoints');

        // 清空小碳點選單
        cpSelect.innerHTML = '<option selected disabled>請選擇選項</option>';

        // 遍歷小碳點數據，僅添加與所選主分類相符的小碳點
        mainCategories.forEach(function(main) {
            if (main.id == selectedMainCategoryId) {
                var option = document.createElement('option');
                option.value = main.carbon_points_available;
                option.text = main.carbon_points_available;
                cpSelect.add(option);
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