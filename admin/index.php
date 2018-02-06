<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

$admin_login = "";

//if not logged in
if (!isset($_SESSION['username'])) {
    $connect->redirect($baseUrl . "admin.php?page=home&action=login");
    exit;
}

//if logged in
$admin_login = "{$_SESSION['username']}";

//to retrive user data
$admin = $connect->execute("SELECT * FROM tbl_admin WHERE username = '{$admin_login}'");

$fakultasQuery  = $connect->execute("SELECT COUNT(*) AS fakultas FROM tbl_fakultas");
$rowFakultas    = $fakultasQuery->fetch_object();

$prodiQuery     = $connect->execute("SELECT COUNT(*) AS prodi FROM tbl_prodi");
$rowProdi       = $prodiQuery->fetch_object();

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/index.view.php";
include "apps/views/layouts/footer.view.php";