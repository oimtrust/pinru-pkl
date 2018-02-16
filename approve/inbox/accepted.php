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

if (isset($_GET['accepted_id']) && !empty($_GET['accepted_id'])) {
    $id_borrow = $_GET['accepted_id'];
    $stmt = $connect->execute("SELECT
                            pinjam.id_peminjaman,
                            pinjam.id_user,
                            user.nama_user,
                            pinjam.id_ruang,
                            ruang.nama_ruang,
                            pinjam.id_hari,
                            hari.nama_hari,
                            pinjam.tgl_pinjam,
                            pinjam.jam_awal,
                            pinjam.jam_akhir,
                            pinjam.status,
                            pinjam.updated_at
                            FROM 
                            tbl_peminjaman AS pinjam 
                            LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                            LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                            LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari
                            WHERE pinjam.id_peminjaman = '{$id_borrow}'");
    $detailBorrow = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'index.php?page=approve&action=inbox&error');
}

if (isset($_POST['btn_accepted'])) {
    $id_peminjaman  = $_POST['id_peminjaman'];
    $alasan         = $_POST['alasan'];
    $id_ruang       = $detailBorrow->id_ruang;

    if ($alasan == '') {
        $error[] = "Alasan wajib di isi";
    } else {
        try {
            if ($approve->acceptedOfBorrow($alasan, $id_peminjaman)) {
            } elseif ($approve->setRoomToUse($id_ruang)) {
            }
            $approve->redirect($baseUrl . 'index.php?page=approve&action=inbox&accepted');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


include "apps/views/layouts/header.view.php";
include "apps/views/approve/menu.view.php";
include "apps/views/approve/inbox/accepted.view.php";
include "apps/views/layouts/footer.view.php";