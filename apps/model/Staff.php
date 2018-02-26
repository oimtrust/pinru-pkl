<?php

include_once 'Connection.php';

class Staff extends Connection
{

    // From Ask MHS
    public function validateRoom($id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir) {
        $jam_awal = date("H:i:s", strtotime("+1 minutes", strtotime($jam_awal)));
        $jam_akhir = date("H:i:s", strtotime("-1 minutes", strtotime($jam_akhir)));

        $result = $this->db->query("SELECT * FROM tbl_peminjaman
                WHERE 
                (
                  (jam_awal BETWEEN '{$jam_awal}' AND '{$jam_akhir}')
                  OR
                  (jam_akhir BETWEEN '{$jam_awal}' AND '{$jam_akhir}')
                )
                  AND
                  tgl_pinjam = '{$tgl_pinjam}' AND id_hari = '{$id_hari}' AND id_ruang = '{$id_ruang}'");
        
        return $result->fetch_assoc();
    }

    public function borrowRoom($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan) {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}')");
    }
    // EndFrom Ask MHS

    public function createBorrowDenied($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {

        $query = "INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan, `status`, alasan)
                  VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}', 'DITOLAK', 'Peminjaman anda pada tanggal $tgl_pinjam dan antara jam $jam_awal hingga $jam_akhir ruang masih terpakai')";
        $result = $this->db->query($query);
    }

    public function createBorrowAccepted($id_user, $id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir, $keterangan)
    {
        $result = $this->db->query("INSERT INTO tbl_peminjaman (id_user, id_ruang, id_hari, tgl_pinjam, jam_awal, jam_akhir, keterangan, `status`, alasan)
                VALUES ('{$id_user}', '{$id_ruang}', '{$id_hari}', '{$tgl_pinjam}', '{$jam_awal}', '{$jam_akhir}', '{$keterangan}', 'DITERIMA', 'Peminjaman anda pada tanggal $tgl_pinjam mulai dari jam $jam_awal hingga jam $jam_akhir di terima')");
    }

    public function setRoomToUse($id_ruang)
    {
        $result = $this->db->query("UPDATE tbl_ruang SET `status` = 'TERPAKAI' WHERE id_ruang = '{$id_ruang}'");
    }

//    public function checkCrashOfShedule($id_ruang, $id_hari, $tgl_pinjam, $jam_awal, $jam_akhir)
//    {
//        $data   = array();
//        $result = $this->db->query("SELECT * FROM tbl_peminjaman
//                    WHERE (
//                            TIME(jam_awal) BETWEEN TIME('{$jam_awal}') AND TIME('{$jam_akhir}') OR
//                            TIME(jam_akhir) BETWEEN TIME('{$jam_awal}') AND TIME ('{$jam_akhir}')
//                          )
//                          AND id_ruang = '{$id_ruang}' AND id_hari = '{$id_hari}' AND tgl_pinjam = '{$tgl_pinjam}'");
//        while ($rows = $result->fetch_object()) {
//            $data[]     = $rows;
//        }
//        return $data;
//    }
}
