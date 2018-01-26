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

if (isset($_POST['btn_save'])) {
    $nama_fakultas = strip_tags($_POST['nama_fakultas']);

    if ($nama_fakultas == '') {
        $error[]    = "Nama Fakultas masih kosong";
    }
    else {
        try {
            if ($adminMastering->createFaculty($nama_fakultas)) {
                
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=faculty-create&saved');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/faculty/create.view.php";
include "apps/views/layouts/footer.view.php";