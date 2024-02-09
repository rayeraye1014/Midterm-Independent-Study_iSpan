<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '訂單列表';
$pageName = 'order_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 25;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT COUNT(1) FROM orders";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位


#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT orders.id, order_type, orders.seller_id, buyer_id, product_id, shipment_fee, payment_status, shipment_status, order_date, complete_status, complete_date, product_name, product_price FROM orders JOIN products ON orders.product_id = products.id ORDER BY id DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}



?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.40_order.php' ?>
    <style>
        .overflow-auto {
            height: 1000px;
        }
    </style>
    <div class="container table-bordered table-striped overflow-auto">
        <div class="row mt-3">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="?page=1">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page != 1 ? $page - 1 : 1 ?>">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                        </li>
                        <?php $visiblePageRange = 5;   #每頁只可看到5頁頁碼
                        $startPage = max(1, $page - floor($visiblePageRange / 2));
                        $endPage = min($totalPages, $startPage + $visiblePageRange - 1); ?>
                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page != 45 ? $page + 1 : 45 ?>">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=45">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="myTable" class="table table-hover sortable-table">
                    <thead>
                        <tr class="table-primary">
                            <th><i id="selectAll" class="fa-solid fa-check-to-slot"></i></a>
                            </th>
                            <th>ID<i id="sortIcon" class="fa-solid fa-caret-down" onclick="sortTable()"></th>
                            <th class="text-nowrap">訂單類型</th>
                            <th>賣家編號</th>
                            <th>買家編號</th>
                            <th>商品名稱</th>
                            <th class="text-nowrap">商品金額</th>
                            <th class="text-nowrap">運費</th>
                            <th>總金額</th>
                            <th class="text-nowrap">付款狀態</th>
                            <th class="text-nowrap">運送狀態</th>
                            <th>下單日期</th>
                            <th>訂單完成狀態</th>
                            <th>訂單完成日期</th>
                            <th><i class="fa-solid fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr>
                                <td><input class="form-check-input me-1" type="checkbox" value="<?= $r['id'] ?>" id="flexCheck<?= $r['id'] ?>" name="delete_ids[]"></td>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['order_type'] ?></td>
                                <td><?= $r['seller_id'] ?></td>
                                <td><?= $r['buyer_id'] ?></td>
                                <td><?= $r['product_name'] ?></td>
                                <td><?= ($r['order_type'] == '以物易物') ? '0' : $r['product_price'] ?></td>
                                <td><?= $r['shipment_fee'] ?></td>
                                <td><?= ($r['order_type'] == '以物易物') ? '0' + $r['shipment_fee'] : $r['product_price'] + $r['shipment_fee'] ?></td>
                                <td><?= $r['payment_status'] ?></td>
                                <td><?= $r['shipment_status'] ?></td>
                                <td><?= $r['order_date'] ?></td>
                                <td class="completeStatus" id="statusText<?= $r['id'] ?>"><?= $r['complete_status'] ?></td>
                                <td id="completeTime<?= $r['id'] ?>" class="completeTime"><?= $r['complete_date'] ?></td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="44.order_edit.php?id=<?= $r['id'] ?>">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </a>
                                        <a href="javascript: delete_one(<?= $r['id'] ?>)">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for success-->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">更新結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-success" role="alert">
                    變更訂單狀態成功
                </div>
            </div>
            <div class="modal-footer">
                <a href="41.order_list.php" class="btn btn-primary">回到訂單列表頁</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for failure-->
<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">更新結果</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="failureInfo">
                    變更訂單狀態失敗
                </div>
            </div>
            <div class="modal-footer">
                <a href="41.order_list.php" class="btn btn-primary">回到訂單列表頁</a>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    function delete_one(id) {
        if (confirm(`是否要刪除編號為 ${id} 的資料?`)) {
            location.href = `43.order-normal_delete.php?id=${id}`;
        }
    }

    function delete_moreThenOne() {
        var checkboxes = document.getElementsByName('delete_ids[]');
        var selectedIds = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedIds.push(checkboxes[i].value);
            }
        }
        if (selectedIds.length > 0 && confirm('是否要刪除所選資料?')) {
            var idsQueryString = selectedIds.join('&delete_ids[]=');
            location.href = `43.order-normal_delete.php?delete_ids[]=${idsQueryString}`;
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // 連結icon和checkbox
        var selectAllIcon = document.getElementById("selectAll");
        var checkboxes = document.querySelectorAll('input[name="delete_ids[]"]');

        // 添加點擊事件監聽器
        selectAllIcon.addEventListener("click", function() {
            //切换所有checkbox選中的狀態
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = !checkbox.checked;
            });
        });
    });

    function searchProd() {
        // 取得輸入框中的關鍵字
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行搜尋
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // 假設名稱在第3個欄位

            if (td) {
                txtValue = td.textContent || td.innerText;

                // 判斷是否包含關鍵字
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchPrice() {
        // 取得輸入框中的最低價格和最高價格
        var minPrice = parseFloat(document.getElementById("minPrice").value) || 0;
        var maxPrice = parseFloat(document.getElementById("maxPrice").value) || Infinity;

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行價格範圍搜尋
        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[5]; // 價格在第6個欄位

            if (td) {
                var price = parseFloat(td.textContent || td.innerText);

                // 判斷是否在價格範圍內
                if (price >= minPrice && price <= maxPrice) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    let sortOrder = -1; // 初始為降冪排列
    function sortTable() {
        const table = document.querySelector('.sortable-table');
        const rows = Array.from(table.rows).slice(1); // Skip the header row
        const isNumberColumn = 1; // 假設 ID 列是數字列

        rows.sort((a, b) => {
            const aValue = isNumberColumn ? parseInt(a.cells[1].textContent, 10) : a.cells[1].textContent;
            const bValue = isNumberColumn ? parseInt(b.cells[1].textContent, 10) : b.cells[1].textContent;

            return sortOrder * (bValue - aValue);
        });

        // 移除現有的行
        rows.forEach(row => table.tBodies[0].appendChild(row));

        // 切換排序順序
        sortOrder *= -1;

        // 更新 icon 顯示
        updateSortIcon();
    }

    function updateSortIcon() {
        const icon = document.getElementById('sortIcon');
        icon.className = sortOrder === 1 ? 'fa-solid fa-caret-up' : 'fa-solid fa-caret-down';
    }

    function change_status(id, status, formattedTime) {
        if (confirm(`${id}訂單是否完成`)) {
            var newStatus = (document.getElementById(`statusText${id}`).innerText == '進行中') ? '已完成' : '進行中';
            const editTime = new Date();
            const year = editTime.getFullYear();
            const month = String(editTime.getMonth() + 1).padStart(2, '0');
            const day = String(editTime.getDate()).padStart(2, '0');
            const hours = String(editTime.getHours()).padStart(2, '0');
            const minutes = String(editTime.getMinutes()).padStart(2, '0');
            const seconds = String(editTime.getSeconds()).padStart(2, '0');
            const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

            console.log(id);
            console.log(status);
            console.log(formattedTime);

            // 使用 fetch 發送 AJAX 請求更新資料
            fetch(`45.order_statusChange.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}&status=${newStatus}&formattedTime=${formattedTime}`,
                })
                .then(r => r.json()).then(data => {
                    console.log(data)
                    if (data.success) {
                        // 更新成功的處理
                        // 使用後端傳回的資料更新前端的狀態
                        const statusTd = document.getElementById(`statusText${id}`);
                        const statusIcon = document.getElementById(`statusIcon${id}`);
                        const editTime = document.getElementById(`completeTime${id}`);
                        console.log('ddd', data);

                        // 更新前端狀態
                        statusIcon.innerHTML = data.icon;
                        statusTd.innerText = data.status;
                        editTime.innerText = data.editTime;
                        successModal.show();

                    } else {
                        // 更新失敗的處理
                        document.querySelector('#failureInfo').innerHTML = data.error;
                        failureModal.show();
                    }
                })
                .catch(error => {
                    document.querySelector('#failureInfo').innerHTML = data.error;
                    failureModal.show('發生錯誤:' + error);
                });
        }
    }


    const successModal = new bootstrap.Modal('#successModal');
    const failureModal = new bootstrap.Modal('#failureModal');
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>