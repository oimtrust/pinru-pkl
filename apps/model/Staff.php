<?php

include_once 'Connection.php';

class Staff extends Connection
{
    public function createBorrowAccepted($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan, `status`)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}', 'DITERIMA')");
    }

    public function setRoomToUse($id_ruang)
    {
        $result = $this->db->query("UPDATE tbl_ruang SET `status` = 'TERPAKAI' WHERE id_ruang = '{$id_ruang}'");
    }

    public function createBorrowDenied($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan, `status`)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}', 'DITOLAK')");
    }
}
