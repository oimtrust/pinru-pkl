<?php

include_once 'Connection.php';

class Approve extends Connection
{
    public function deniedOfBorrow($alasan, $id_peminjaman)
    {
        $result     = $this->db->query("UPDATE tbl_peminjaman SET `status` = 'DITOLAK', alasan = '{$alasan}' WHERE id_peminjaman = '{$id_peminjaman}'");
    }

    public function setRoomToEmpty($id_ruang)
    {
        $result     = $this->db->query("UPDATE tbl_ruang SET `status` = 'KOSONG' WHERE id_ruang = '{$id_ruang}'");
    }
}