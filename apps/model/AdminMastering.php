<?php

include_once 'Connection.php';

class AdminMastering extends Connection
{
    public function createFaculty($nama_fakultas)
    {
        $result = $this->db->query("INSERT INTO tbl_fakultas(nama_fakultas) VALUES ('{$nama_fakultas}')");
    }

    public function updateFaculty($nama_fakultas, $id_fakultas)
    {
        $result = $this->db->query("UPDATE tbl_fakultas SET nama_fakultas = '{$nama_fakultas}' WHERE id_fakultas = '{$id_fakultas}'");
    }

    public function deleteFaculty($id_fakultas)
    {
        $result = $this->db->query("DELETE FROM tbl_fakultas WHERE id_fakultas = '{$id_fakultas}'");
    }

    public function createPrody($nama_prodi, $id_fakultas)
    {
        $result = $this->db->query("INSERT INTO tbl_prodi(nama_prodi, id_fakultas) VALUES ('{$nama_prodi}', '{$id_fakultas}')");
    }

    public function updatePrody($id_prodi, $nama_prodi, $id_fakultas)
    {
        $result = $this->db->query("UPDATE tbl_prodi SET nama_prodi = '{$nama_prodi}', id_fakultas = '{$id_fakultas}' WHERE id_prodi = '{$id_prodi}'");
    }

    public function deletePrody($id_prodi)
    {
        $result = $this->db->query("DELETE FROM tbl_prodi WHERE id_prodi = '{$id_prodi}'");
    }

    public function createRoom($nama_ruang)
    {
        $result = $this->db->query("INSERT INTO tbl_ruang (nama_ruang) VALUES ('{$nama_ruang}')");
    }
}