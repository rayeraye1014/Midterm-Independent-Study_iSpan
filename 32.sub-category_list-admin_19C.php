<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '商品子分類管理-機車汽車';
$pageName = 'sub-category_car';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 25;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT COUNT(1) FROM categories_main join categories_sub on categories_sub.main_category = categories_main.id WHERE main = '機車汽車'";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位

/* 測試用
echo json_encode([
  'totalRows' => $totalRows,
  'totalPages' => $totalPages
]);
exit; #結束 #die('xxx') 功能和exit一樣，但可能破壞頁面
*/

#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT * FROM categories_main join categories_sub on categories_sub.main_category = categories_main.id  WHERE main = '機車汽車' ORDER BY categories_sub.id DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

$sql_join = "SELECT categories_main.id, main, main_category, sub FROM categories_main join categories_sub on categories_sub.main_category = categories_main.id";
$result = $pdo->query($sql_join);
$sql_join2 = $result->fetchAll();

#取得分頁資料
// echo json_encode($rows);
// exit;

?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<style>
    .overflow-auto {
        height: 865px;
    }
</style>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.30_sub-category.php' ?>
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
        <div class="row">
            <div class="col">
                <table id="myTable" class="table table-hover sortable-table">
                    <thead>
                        <tr class="table-primary text-center">
                            <th><i id="selectAll" class="fa-solid fa-check-to-slot" title="全選/選取checkBox"></i></a>
                            </th>
                            <th>編號<i id="sortIcon" class="fa-solid fa-caret-down" onclick="sortTable()" title="變更排序"></th>
                            <th>子分類名稱</th>
                            <th>主分類名稱</th>
                            <th>所屬主分類代碼</th>
                            <th><i class="fa-solid fa-wrench" title="功能區"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr class="text-center">
                                <td>
                                    <input class="form-check-input me-1" type="checkbox" value="<?= $r['id'] ?>" id="flexCheck<?= $r['id'] ?>" name="delete_ids[]">
                                </td>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['sub'] ?></td>
                                <td><?= $r['main'] ?></td>
                                <td><?= $r['main_category'] ?></td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="38.sub-category_edit.php?id=<?= $r['id'] ?>">
                                            <i class="fa-solid fa-file-pen" title="編輯"></i>
                                        </a>
                                        <a href="javascript: delete_one(<?= $r['id'] ?>)">
                                            <i class="fa-solid fa-trash" title="刪除"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    function delete_one(id) {
        if (confirm(`是否要刪除編號為 ${id} 的資料?`)) {
            location.href = `36.sub-category_delete.php?id=${id}`;
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
            location.href = `36.sub-category_delete.php?delete_ids[]=${idsQueryString}`;
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
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>