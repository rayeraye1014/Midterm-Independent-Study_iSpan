<?php
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '商品管理';
$pageName = 'product_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 20;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT COUNT(1) FROM products";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位

#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT products.id, seller_id, main_category, sub_category, product_photos, product_name, product_price, product_quantity, product_intro, products.carbon_points_available, created_at, edit_new, status_now, main FROM products JOIN categories_main ON products.main_category = categories_main.id ORDER BY id DESC LIMIT  %s, %s", ($page - 1) * $perPage, $perPage);
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
        height: 1100px;
    }
</style>

<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.php' ?>
    <div class="container-fluid table-bordered table-striped overflow-auto">
        <div class="row mt-3">
            <div class="col">
                <h6>共<?= $totalRows ?>筆</h6>
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
                            <a class="page-link" href="?page=<?= $page != 200 ? $page + 1 : 200 ?>">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=200">
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
                        <tr class="table-info text-center text-nowrap">
                            <th>ID<i id="sortIcon" class="fa-solid fa-caret-down" onclick="sortTable()" title="變更排序"></i>
                            </th>
                            <th>Seller</th>
                            <th>Main</th>
                            <th>Sub</th>
                            <th>Photos</th>
                            <th>ProductName</th>
                            <th>Intro</th>
                            <th>CPoints</th>
                            <th>Createdtime</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr class="text-center">
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['seller_id'] ?></td>
                                <td><?= $r['main'] ?></td>
                                <td><?= $r['sub_category'] ?></td>
                                <td><img class="td-img" src="./02.imgs/<?= explode(",", $r['product_photos'])[0] ?>" alt=""></td>
                                <td><?= $r['product_name'] ?></td>
                                <td class="text-truncate" style="max-width: 180px;"><?= $r['product_intro'] ?></td>
                                <td><?= $r['carbon_points_available'] ?></td>
                                <td class="text-nowrap"><?= $r['created_at'] ?></td>
                                <td class="status text-nowrap" id="statusText<?= $r['id'] ?>"><?= $r['status_now'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    function searchProd() {
        // 取得輸入框中的關鍵字
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行搜尋
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[6]; // 假設名稱在第6個欄位
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


    let sortOrder = -1; // 初始為降冪排列
    function sortTable() {
        const table = document.querySelector('.sortable-table');
        const rows = Array.from(table.rows).slice(1); // Skip the header row
        const isNumberColumn = 1; // 假設 ID 列是數字列

        rows.sort((a, b) => {
            const aValue = a.cells[1].textContent;
            const bValue = b.cells[1].textContent;

            return sortOrder * aValue.localeCompare(bValue);
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