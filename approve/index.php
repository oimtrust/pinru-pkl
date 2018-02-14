<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$userLogin = "";

//if not logged in
if (!isset($_SESSION['username'])) {
    $connect->redirect($baseUrl . "index.php?page=approve&action=login");
    exit;
}

//if logged in
$userLogin = "{$_SESSION['username']}";

//to retrive user data
$user = $connect->execute("SELECT * FROM tbl_admin WHERE username = '{$userLogin}'");

$inboxQuery = $connect->execute("SELECT COUNT(*) AS total FROM tbl_peminjaman");
$rowInbox = $inboxQuery->fetch_object();

include "apps/views/layouts/header.view.php";
include "apps/views/approve/menu.view.php";
include "apps/views/approve/index.view.php";
include "apps/views/layouts/footer.view.php";