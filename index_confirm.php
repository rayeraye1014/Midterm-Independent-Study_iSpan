<?php
session_start();
if (isset($_SESSION['admin'])) {
    include __DIR__ . '/index_main.php';
} else {
    include __DIR__ . '/index_main-no-admin.php';
}
