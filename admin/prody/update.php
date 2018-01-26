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
    $id_prodi = $_GET['update_id'];
    $stmt = $connect->execute("SELECT
            prodi.id_prodi,
            prodi.nama_prodi,
            fakultas.id_fakultas,
            fakultas.nama_fakultas
            FROM tbl_prodi AS prodi 
            LEFT JOIN tbl_fakultas AS fakultas 
            ON prodi.id_fakultas = fakultas.id_fakultas 
            WHERE prodi.id_prodi = '{$id_prodi}'
            ORDER BY prodi.updated_at DESC");
    $detailPrody = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'admin.php?page=home&action=prody');
}

if (isset($_POST['btn_update'])) {
    $id_prodi       = $_POST['id_prodi'];
    $nama_prodi     = $_POST['nama_prodi'];
    $id_fakultas    = $_POST['id_fakultas'];

    if ($nama_prodi == '') {
        $error[]    = "Nama Prodi masih kosong!";
    } elseif (empty($id_fakultas)) {
        $error[]    = "Fakultas harus di pilih";
    } else {
        try {
            if ($adminMastering->updatePrody($id_prodi, $nama_prodi, $id_fakultas)) {  
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=prody&updated');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/prody/update.view.php";
include "apps/views/layouts/footer.view.php";