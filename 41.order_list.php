<?php
session_start();
if (isset($_SESSION['admin'])) {
    include __DIR__ . '/41.order_list-admin.php';
} else {
    include __DIR__ . '/41.order_list-no-admin.php';
}
