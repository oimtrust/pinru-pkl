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

if (isset($_GET['update_id']) && !empty($_GET['update_id'])) {
    $id_room = $_GET['update_id'];
    $stmt = $connect->execute("SELECT * FROM tbl_ruang WHERE id_ruang = '{$id_room}'");
    $detailRoom = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'admin.php?page=home&action=room&error');
}

if (isset($_POST['btn_update'])) {
    $id_ruang   = $_POST['id_ruang'];
    $nama_ruang = strip_tags($_POST['nama_ruang']);

    if ($nama_ruang == '') {
        $error[]    = "Nama ruang tidak boleh kosong!";
    } else {
        try {
            if ($adminMastering->updateRoom($nama_ruang, $id_ruang)) {
                
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=room&updated');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/room/update.view.php";
include "apps/views/layouts/footer.view.php";