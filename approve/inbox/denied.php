<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['denied_id']) && !empty($_GET['denied_id'])) {
    $id_peminjaman  = $_GET['denied_id'];
    $ruangQuery     = $connect->execute("SELECT id_ruang FROM tbl_peminjaman WHERE id_peminjaman = '{$id_peminjaman}'");
    $rowRuang       = $ruangQuery->fetch_object();
    $id_ruang       = $rowRuang->id_ruang;

    if ($approve->deniedOfBorrow($id_peminjaman)) {
    } elseif ($approve->setRoomToEmpty($id_ruang)) {
    }
    $approve->redirect($baseUrl . 'index.php?page=approve&action=inbox');
} 

