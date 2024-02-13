<?php
require __DIR__ . '/0.parts/pdo-connect.php';
$title = '優惠券列表';
$pageName = 'coupon_list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('local: ?page=1');
    exit;
}
$perPage = 25;   #每一頁有幾筆

#算總筆數
$t_sql = "SELECT COUNT(1) FROM coupon";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);  #總頁數  #ceil = javascript的max.ceil一樣功能，無條件進位


#如果有資料的話，才執行，故會先給一個預設值，頁碼超出範圍時，會給最後一頁
$row = [];   #預設值
if ($totalRows) {
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
    }

    # ``可以不用標，這個只用來標示資料表名稱；''單引號只可以用來標示值
    $sql = sprintf("SELECT * FROM coupon ORDER BY id DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}



?>
<?php include __DIR__ . '/0.parts/html-head.php' ?>
<?php include __DIR__ . '/0.parts/sidebar.php' ?>
<div class="container-fluid px-0 mx-0">
    <?php include __DIR__ . '/0.parts/navbar.60_coupon.php' ?>
    <style>
        .overflow-auto {
            height: 1000px;
        }
    </style>
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
                        <tr class="table-info text-center">
                            <th>ID<i id="sortIcon" class="fa-solid fa-caret-down" onclick="sortTable()" title="變更排序"></th>
                            <th class="text-nowrap">優惠券類別</th>
                            <th class="text-nowrap">優惠券名稱</th>
                            <th class="text-nowrap">折扣</th>
                            <th class="text-nowrap">開始日期</th>
                            <th class="text-nowrap">結束日期</th>
                            <th class="text-nowrap">優惠券狀態</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $r) : ?>
                            <tr class="text-center">
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['coupon_type'] ?></td>
                                <td><?= $r['coupon_name'] ?></td>
                                <td><?= $r['coupon_discount'] ?></td>
                                <td><?= $r['start_date'] ?></td>
                                <td><?= $r['vaild_date'] ?></td>
                                <td><?= $r['coupon_status'] ?></td>
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
    function filterType() {
        // 獲取下拉式選單的值
        var selectedCouponType = document.getElementById("couponTypeFilter").value;

        // 獲取表格的所有行
        var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // 遍歷每一行，根據選擇的值來顯示或隱藏行
        for (let i = 0; i < rows.length; i++) {
            var couponTypeCell = rows[i].getElementsByTagName("td")[1]; // 第2列是優惠券類型列

            if (couponTypeCell) {
                var couponType = couponTypeCell.textContent || couponTypeCell.innerText;

                // 判斷是否要顯示或隱藏該行
                if (selectedCouponType === '全部' || couponType.trim() === selectedCouponType.trim()) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }

    function filterStatus() {
        // 獲取下拉式選單的值
        var selectedStatus = document.getElementById("statusFilter").value;

        // 獲取表格的所有行
        var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        // 遍歷每一行，根據選擇的值來顯示或隱藏行
        for (let i = 0; i < rows.length; i++) {
            var statusCell = rows[i].getElementsByTagName("td")[6]; // 第7列是優惠券狀態列

            if (statusCell) {
                var status = statusCell.textContent || statusCell.innerText;

                // 判斷是否要顯示或隱藏該行
                if (selectedStatus === '全部' || status.trim() === selectedStatus.trim()) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }

    function searchType() {
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

    function searchDate() {
        // 取得輸入框中的開始日期和結束日期
        var minDate = new Date(document.getElementById("minDate").value);
        var maxDate = new Date(document.getElementById("maxDate").value);

        var table = document.getElementById("myTable");
        var tr = table.getElementsByTagName("tr");

        // 遍歷表格的每一行，進行評價分數範圍搜尋
        for (var i = 1; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[4]; // 開始日期在第5個欄位
            var td2 = tr[i].getElementsByTagName("td")[5]; // 結束日期在第6個欄位

            if (td && td2) {
                var start = new Date(td.textContent || td.innerText);
                var end = new Date(td2.textContent || td2.innerText);

                // 判斷是否在價格範圍內
                if (minDate <= start && maxDate >= end) {
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


    const successModal = new bootstrap.Modal('#successModal');
    const failureModal = new bootstrap.Modal('#failureModal');
</script>
<?php include __DIR__ . '/0.parts/html-foot.php' ?>