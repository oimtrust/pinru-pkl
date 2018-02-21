<?php

include_once 'Connection.php';

class Staff extends Connection
{
    public function createBorrow($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}')");
    }

    public function createBorrowDenied($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan, `status`)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}', 'DITOLAK')");
    }

    public function createBorrowAccepted($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan, `status`)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}', 'DITERIMA')");
    }
}
