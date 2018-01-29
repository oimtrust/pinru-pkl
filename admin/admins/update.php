<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

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

if (isset($_GET['update_id']) && !empty($_GET['update_id'])) {
    $id_admin = $_GET['update_id'];
    $stmt = $connect->execute("SELECT * FROM tbl_admin WHERE id_admin = '{$id_admin}'");
    $detailAdmin = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'admin.php?page=home&action=admins&error');
}

if (isset($_POST['btn_update'])) {
    $id_admin       = $_POST['id_admin'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
    $status         = $_POST['status'];

    if ($username == '') {
        $error[]    = "Username masih kosong!";
    } elseif ($password == '') {
        $error[]    = "Password masih kosong!";
    } elseif (empty($status)) {
        $error[]    = "Status belum dipilih";
    } else {
        try {
            if ($adminMastering->updateAdmins($username, $password, $status, $id_admin)) {
                
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=admins&updated');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/admins/update.view.php";
include "apps/views/layouts/footer.view.php";