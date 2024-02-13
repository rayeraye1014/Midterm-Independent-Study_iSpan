<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '家具家居商品列表';
$pageName = 'product_list-home';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 25;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT count(1) FROM products JOIN categories_main ON products.main_category = categories_main.id WHERE main = '家具家居'";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位

#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT products.id, seller_id, main_category, sub_category, product_photos, product_name, product_price, product_quantity, product_intro, products.carbon_points_available, created_at, edit_new, status_now, main FROM products JOIN categories_main ON products.main_category = categories_main.id WHERE main = '家具家居' ORDER BY id LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

#取得分頁資料
// echo json_encode($rows);
// exit;



?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
    .td-img {
        width: 100px;
    }

    .overflow-auto {
        height: 900px;
    }
</style>

<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.20_product.php' ?>
    <div class="container-fluid table-bordered table-striped overflow-auto">
        <div class="row">
            <div class="col">
                <h6>共<?= $totalRows ?>筆</h6>
                <table id="myTable" class="table table-hover sortable-table">
                    <thead>
                        <tr class="table-primary text-center">
                            <th><i id="selectAll" class="fa-solid fa-check-to-slot" title="全選/選取checkBox"></i></th>
                            <th>ID<i id="sortIcon" class="fa-solid fa-caret-down" onclick="sortTable()" title="變更排序"></i></th>
                            <th>Seller</th>
                            <th>Main</th>
                            <th>Sub</th>
                            <th>Photos</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Intro</th>
                            <th>CPoints</th>
                            <th>CreatedTime</th>
                            <th>UpdatedTime</th>
                            <th>Status</th>
                            <th><i class="fa-solid fa-wrench" title="功能區"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr class="text-center">
                                <td><input class="form-check-input me-1" type="checkbox" value="<?= $r['id'] ?>" id="flexCheck<?= $r['id'] ?>" name="delete_ids[]"></td>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['seller_id'] ?></td>
                                <td class="text-nowrap"><?= $r['main'] ?></td>
                                <td><?= $r['sub_category'] ?></td>
                                <td><img class="td-img" src="./02.imgs/<?= explode(",", $r['product_photos'])[0] ?>" alt=""></td>
                                <td><?= $r['product_name'] ?></td>
                                <td><?= $r['product_price'] ?></td>
                                <td><?= $r['product_quantity'] ?></td>
                                <td class="text-truncate" style="max-width: 180px;"><?= $r['product_intro'] ?></td>
                                <td><?= $r['carbon_points_available'] ?></td>
                                <td class="text-nowrap"><?= $r['created_at'] ?></td>
                                <td class="text-nowrap"><?= $r['edit_new'] ?></td>
                                <td class="text-nowrap"><?= $r['status_now'] ?></td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="javascript: change_status(<?= $r['id'] ?>)" title="變更上下架">
                                            <?php if ($r['status_now'] == '上架中') : ?>
                                                <i class="fa-solid fa-turn-down"></i>
                                            <?php else : ?>
                                                <i class="fa-solid fa-turn-up"></i>
                                            <?php endif; ?>
                                        </a>
                                        <a href="24.product_edit.php?id=<?= $r['id'] ?>">
                                            <i class="fa-solid fa-file-pen" title="編輯"></i>
                                        </a>
                                        <a href="javascript: delete_one(<?= $r['id'] ?>)">
                                            <i class="fa-solid fa-trash" title="刪除"></i>
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
    <div class="row mx-3">
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
                        <a class="page-link" href="?page=<?= $page != 40 ? $page + 1 : 40 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?page=40">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>
<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    function delete_one(id) {
        if (confirm(`是否要刪除編號為 ${id} 的資料?`)) {
            location.href = `23.product_delete.php?id=${id}`;
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
            location.href = `04.member_delete.php?delete_ids[]=${idsQueryString}`;
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


    function searchPrice() {
        // 取得輸入框中的最低價格和最高價格
        var minPrice = parseFloat(document.getElementById("minPrice").value) || 0;
        var maxPrice = parseFloat(document.getElementById("maxPrice").value) || Infinity;

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行價格範圍搜尋
        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[7]; // 價格在第8個欄位

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

    function searchProd() {
        // 取得輸入框中的關鍵字
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行搜尋
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6]; // 假設名稱在第7個欄位

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
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>