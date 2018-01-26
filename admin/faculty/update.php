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

if (isset($_GET['update_id']) && !empty($_GET['update_id'])) {
    $id_fakultas = $_GET['update_id'];
    $stmt = $connect->execute("SELECT * FROM tbl_fakultas WHERE id_fakultas = '{$id_fakultas}'");
    $detailFaculty = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'admin.php?page=home&action=faculty');   
}

if (isset($_POST['btn_update'])) {
    $id_fakultas    = $_POST['id_fakultas'];
    $nama_fakultas  = $_POST['nama_fakultas'];

    if ($nama_fakultas == '') {
        $error[]    = "Nama Fakultas tidak boleh kosong!";
    } else {
        try {
            if ($adminMastering->updateFaculty($nama_fakultas, $id_fakultas)) {
                
            }
            $adminMastering->redirect($baseUrl.'admin.php?page=home&action=faculty&updated');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/faculty/update.view.php";
include "apps/views/layouts/footer.view.php";