<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

if (isset($_POST['btn_save'])) {
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    $status     = $_POST['status'];

    if ($username == '') {
        $error[]    = "Username masih kosong";
    } elseif ($password == '') {
        $error[]    = "Password masih kosong";
    } elseif (empty($status)) {
        $error[]    = "Status masih belum dipilih";
    } else {
        try {
            if ($adminMastering->createAdmins($username, $password, $status)) {
                
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=admins-create&saved');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/admins/create.view.php";
include "apps/views/layouts/footer.view.php";