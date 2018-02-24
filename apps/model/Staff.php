<?php

include_once 'Connection.php';

class Staff extends Connection
{

    // From Ask MHS
    public function validateRoom($id_ruang, $tgl_pinjam, $jam_awal, $jam_akhir) {
        $jam_awal = date("H:i:s", strtotime("+1 minutes", strtotime($jam_awal)));
        $jam_akhir = date("H:i:s", strtotime("-1 minutes", strtotime($jam_akhir)));

        $result = $this->db->query("SELECT * FROM tbl_peminjaman WHERE ((jam_awal BETWEEN '{$jam_awal}' AND '{$jam_akhir}') OR (jam_akhir BETWEEN '{$jam_awal}' AND '{$jam_akhir}')) AND tgl_pinjam = '{$tgl_pinjam}'");
        
        return $result->fetch_assoc();
    }

    public function borrowRoom($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan) {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}')");
    }
    // EndFrom Ask MHS

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

    public function checkCrashOfShedule($id_ruang, $id_hari, $jam_awal, $jam_akhir)
    {
        $data   = array();

//        $result = $this->db->query("SELECT * FROM tbl_peminjaman
//                  WHERE (jam_awal BETWEEN '{$jam_awal}' AND '{$jam_akhir}')
//                  OR (jam_akhir BETWEEN '{$jam_akhir}' AND '{$jam_akhir}')
//                  AND id_ruang = '{$id_ruang}' AND id_hari = '{$id_hari}'");
        $result = $this->db->query("SELECT * FROM tbl_peminjaman
                    WHERE (
                            TIME(jam_awal) BETWEEN TIME('{$jam_awal}') AND TIME('{$jam_akhir}') OR
                            TIME(jam_akhir) BETWEEN TIME('{$jam_awal}') AND TIME ('{$jam_akhir}')
                          )
                          AND id_ruang = '{$id_ruang}' AND id_hari = '{$id_hari}'");
        while ($rows = $result->fetch_object()) {
            $data[]     = $rows;
        }
        return $data;
    }
}
