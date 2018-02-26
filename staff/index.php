<?php

date_default_timezone_set("Asia/Jakarta");

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

if (isset($_POST['btn_borrow'])) {
    $id_user        = $_POST['id_user'];
    $id_ruang       = $_POST['id_ruang'];
    $id_hari        = $_POST['id_hari'];
    $postTglPinjam  = $_POST['tgl_pinjam'];
    $tgl_pinjam     = date("Y-m-d", strtotime($postTglPinjam));
    $postJam_awal   = $_POST['jam_awal'];
    $jam_awal       = date("H:i:s", strtotime($postJam_awal));
    $postJam_akhir  = $_POST['jam_akhir'];
    $jam_akhir      = date("H:i:s", strtotime($postJam_akhir));
    $keterangan     = $_POST['keterangan'];

//    $dateNow        = $staff->execute("select * from tbl_peminjaman where tgl_pinjam = curdate() and id_ruang = '{$id_ruang}'");
//    $checkTime      = $dateNow->fetch_object();

    if (empty($id_ruang)) {
        $error[]    = "Ruang belum dipilih";
    } elseif (empty($id_hari)) {
        $error[]    = "Hari belum dipilih";
    } elseif ($postTglPinjam == '') {
        $error      = "Tanggal belum dipilih";
    } elseif ($postJam_awal == '') {
        $error[]    = "Jam awal belum dipilih";
    } elseif ($postJam_akhir == '') {
        $error[]    = "Jam akhir belum dipilih";
    } elseif ($keterangan == '') {
        $error[]    = "Keterangan masih kosong";
    } else {



    // From AskMHS
    $usedRooms = $staff->validateRoom($id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir);


        try {
            if ($usedRooms === NULL) {
                $staff->createBorrowAccepted($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan);
                $staff->setRoomToUse($id_ruang);
                $staff->redirect($baseUrl.'index.php?page=staff&action=home&accepted');
            } else {
                $staff->createBorrowDenied($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan);
                $staff->redirect($baseUrl.'index.php?page=staff&action=home&denied');

//                echo "Ruang $id_ruang pada tanggal $tgl_pinjam antara jam $jam_awal sampai dengan jam $jam_akhir sedang terpakai.";

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/staff/menu.view.php";
include "apps/views/staff/index.view.php";
include "apps/views/layouts/footer.view.php";