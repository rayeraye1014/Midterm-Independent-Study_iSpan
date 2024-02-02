<?php
session_start();
if (isset($_SESSION['admin'])) {
    include __DIR__ . '/21.product_list-admin.php';
} else {
    include __DIR__ . '/21.product_list-no-admin.php';
}
