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

$ruang_query = $connect->execute("SELECT ruang.id_ruang, ruang.nama_ruang, COUNT(*) AS total FROM tbl_peminjaman AS pinjam 
                LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang GROUP BY ruang.id_ruang HAVING (COUNT(ruang.id_ruang) > 0)");
$total_ruang = $connect->execute("SELECT ruang.id_ruang, ruang.nama_ruang, COUNT(*) AS total FROM tbl_peminjaman AS pinjam 
                LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang GROUP BY ruang.id_ruang HAVING (COUNT(ruang.id_ruang) > 0)");

include 'apps/views/layouts/header.view.php';
include 'apps/views/approve/menu.view.php';
include 'apps/views/approve/report/chart.view.php';
include 'apps/views/layouts/footer.view.php';
