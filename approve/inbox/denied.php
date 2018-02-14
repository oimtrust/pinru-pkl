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

if (isset($_GET['denied_id']) && !empty($_GET['denied_id'])) {
    $id_borrow = $_GET['denied_id'];
    $stmt = $connect->execute("SELECT * FROM tbl_peminjaman WHERE id_peminjaman = '{$id_borrow}'");
    $detailBorrow = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'index.php?page=approve&action=inbox&error');
}

if (isset($_POST['btn_denied'])) {
    $id_peminjaman  = $_POST['id_peminjaman'];
    $alasan         = $_POST['alasan'];

    if ($alasan == '') {
        $error[]    = "Alasan wajib di isi";
    } else {
        try {
            if ($approve->deniedOfBorrow($alasan, $id_peminjaman)) {
                
            }
            $approve->redirect($baseUrl.'index.php?page=approve&action=inbox&denied');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}


include "apps/views/layouts/header.view.php";
include "apps/views/approve/menu.view.php";
include "apps/views/approve/inbox/denied.view.php";
include "apps/views/layouts/footer.view.php";