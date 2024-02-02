<?php
session_start();
if (isset($_SESSION['admin'])) {
  include __DIR__ . '/32.sub-category_list-admin.php';
} else {
  include __DIR__ . '/32.sub-category_list-no-admin.php';
}
