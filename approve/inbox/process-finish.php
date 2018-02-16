<?php

$id_borrow = $_GET['finish_id'];

$query = $approve->execute("SELECT
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

$rowBorrow  = $query->fetch_object();

$id_peminjaman  = $rowBorrow->id_peminjaman;
$id_ruang       = $rowBorrow->id_ruang;

if ($approve->finishOfBorrow($id_peminjaman)) {
    
} elseif ($approve->setRoomToEmpty($id_ruang)) {
    
}
$approve->redirect($baseUrl.'index.php?page=approve&action=inbox-process&finish');