<?php
session_start();
if (isset($_SESSION['admin'])) {
    include __DIR__ . '/51.evaluation_list-admin.php';
} else {
    include __DIR__ . '/51.evaluation_list-no-admin.php';
}
