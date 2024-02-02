<?php
session_start();
if (isset($_SESSION['admin'])) {
  include __DIR__ . '/01.member_list-admin.php';
} else {
  include __DIR__ . '/01.member_list-no-admin.php';
}
