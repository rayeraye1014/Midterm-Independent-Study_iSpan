<?php
session_start();
if (isset($_SESSION['admin'])) {
  include __DIR__ . '/31.main-category_list-admin.php';
} else {
  include __DIR__ . '/31.main-category_list-no-admin.php';
}
