<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_GET['detail_id']) && !empty($_GET['detail_id'])) {
    $id_pinjam = $_GET['detail_id'];
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
                            pinjam.keterangan,
                            pinjam.status
                            FROM tbl_peminjaman AS pinjam
                            LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                            LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                            LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari
                            WHERE pinjam.id_peminjaman = '{$id_pinjam}'");
    $detailPinjam = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'index.php?page=home&action=schedule');
}

include "apps/views/layouts/header.view.php";
include "apps/views/menu.view.php";
include "apps/views/detail.view.php";
include "apps/views/layouts/footer.view.php";