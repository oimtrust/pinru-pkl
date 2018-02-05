<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

$userLogin = "";

//if not logged in
if (!isset($_SESSION['id_user'])) {
    $connect->redirect($baseUrl . "index.php?page=staff&action=login");
    exit;
}

//if logged in
$userLogin = "{$_SESSION['id_user']}";

//to retrive user data
$userQuery = $connect->execute("SELECT * FROM tbl_user WHERE id_user = '{$userLogin}'");

$rowUser = $userQuery->fetch_object();

include "apps/views/layouts/header.view.php";
include "apps/views/staff/menu.view.php";
include "apps/views/staff/history/index.view.php";
include "apps/views/layouts/footer.view.php";