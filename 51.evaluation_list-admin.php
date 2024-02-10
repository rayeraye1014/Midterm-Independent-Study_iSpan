<?php
require __DIR__ . '/0.parts/admin-require.php';
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '評價列表';
$pageName = 'evaluation_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 25;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT COUNT(1) FROM evaluations";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位


#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT evaluations.id, order_id, order_type, buyer_id, rating, comments, evaluation_date FROM evaluations JOIN orders ON evaluations.order_id = orders.id ORDER BY id DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}



?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.50_evaluation.php' ?>
    <style>
        .overflow-auto {
            height: 1000px;
        }
    </style>
    <div class="container table-bordered table-striped overflow-auto">
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
                            <th class="text-nowrap">訂單編號</th>
                            <th class="text-nowrap">訂單類型</th>
                            <th class="text-nowrap">買家編號</th>
                            <th class="text-nowrap">評分分數</th>
                            <th>評論</th>
                            <th class="text-nowrap">評論日期</th>
                            <th><i class="fa-solid fa-wrench"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr>
                                <td><input class="form-check-input me-1" type="checkbox" value="<?= $r['id'] ?>" id="flexCheck<?= $r['id'] ?>" name="delete_ids[]"></td>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['order_id'] ?></td>
                                <td><?= $r['order_type'] ?></td>
                                <td><?= $r['buyer_id'] ?></td>
                                <td><?= $r['rating'] ?></td>
                                <td><?= $r['comments'] ?></td>
                                <td><?= $r['evaluation_date'] ?></td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="54.evaluation_edit.php?id=<?= $r['id'] ?>">
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
                    變更評價內容成功
                </div>
            </div>
            <div class="modal-footer">
                <a href="51.evaluation_list.php" class="btn btn-primary">回到評論列表頁</a>
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
                    變更評論內容失敗
                </div>
            </div>
            <div class="modal-footer">
                <a href="51.evaluation_list.php" class="btn btn-primary">回到評論列表頁</a>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/0.parts/script.php' ?>
<script>
    function delete_one(id) {
        if (confirm(`是否要刪除編號為 ${id} 的資料?`)) {
            location.href = `53.evaluation_delete.php?id=${id}`;
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
            location.href = `53.evaluation_delete.php?delete_ids[]=${idsQueryString}`;
        }
    }

    function filterOrders() {
        // 獲取下拉式選單的值
        var selectedOrderType = document.getElementById("orderTypeFilter").value;

        // 獲取表格的所有行
        var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // 遍歷每一行，根據選擇的值來顯示或隱藏行
        for (let i = 0; i < rows.length; i++) {
            var orderTypeCell = rows[i].getElementsByTagName("td")[3]; // 第4列是訂單類型列

            if (orderTypeCell) {
                var orderType = orderTypeCell.textContent || orderTypeCell.innerText;

                // 判斷是否要顯示或隱藏該行
                if (selectedOrderType === '全部' || orderType.trim() === selectedOrderType.trim()) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }

    function filterRating() {
        // 獲取下拉式選單的值
        var selectedRating = document.getElementById("ratingFilter").value;

        // 獲取表格的所有行
        var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // 遍歷每一行，根據選擇的值來顯示或隱藏行
        for (let i = 0; i < rows.length; i++) {
            var ratingCell = rows[i].getElementsByTagName("td")[5]; // 第6列是付款狀態列

            if (ratingCell) {
                var rating = ratingCell.textContent || ratingCell.innerText;

                // 判斷是否要顯示或隱藏該行
                if (selectedRating === '全部' || rating.trim() === selectedRating.trim()) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }

    function filterDate() {
        // 獲取下拉式選單的值
        var selectedYear = document.getElementById("dateFilter").value;

        // 獲取表格的所有行
        var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // 遍歷每一行，根據選擇的值來顯示或隱藏行
        for (let i = 0; i < rows.length; i++) {
            var dateCell = rows[i].getElementsByTagName("td")[7]; // 第8列是評論日期列

            if (dateCell) {
                var date = dateCell.textContent || dateCell.innerText;

                // 從日期字串中提取年份
                var year = date.substring(0, 4);

                // 判斷是否要顯示或隱藏該行
                if (selectedYear === '全部' || year === selectedYear) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
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
            td = tr[i].getElementsByTagName("td")[3]; // 假設名稱在第4個欄位

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

    function searchRating() {
        // 取得輸入框中的最低評價分數和最高評價分數
        var minRating = parseFloat(document.getElementById("minRating").value) || 1;
        var maxRating = parseFloat(document.getElementById("maxRating").value) || 5;

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行評價分數範圍搜尋
        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[5]; // 評價分數在第6個欄位

            if (td) {
                var rating = parseFloat(td.textContent || td.innerText);

                // 判斷是否在價格範圍內
                if (rating >= minRating && rating <= maxRating) {
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


    const successModal = new bootstrap.Modal('#successModal');
    const failureModal = new bootstrap.Modal('#failureModal');
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>