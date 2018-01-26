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

if (isset($_POST['btn_save'])) {
    $nama_prodi     = strip_tags($_POST['nama_prodi']);
    $id_fakultas    = $_POST['id_fakultas'];

    if (empty($id_fakultas)) {
        $error[]    = "Fakultas belum dipilih";
    } elseif ($nama_prodi == '') {
        $error[]    = "Nama Prodi harus di isi!";
    } else {
        try {
            if ($adminMastering->createPrody($nama_prodi, $id_fakultas)) {
                
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=prody-create&saved');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/prody/create.view.php";
include "apps/views/layouts/footer.view.php";