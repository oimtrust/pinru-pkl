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

    public function updateRoom($nama_ruang, $id_ruang)
    {
        $result = $this->db->query("UPDATE tbl_ruang SET nama_ruang = '{$nama_ruang}' WHERE id_ruang = '{$id_ruang}'");
    }

    public function deleteRoom($id_ruang)
    {
        $result = $this->db->query("DELETE FROM tbl_ruang WHERE id_ruang = '{$id_ruang}'");
    }

    public function createUser($id_user, $password, $nama_user, $id_fakultas, $id_prodi, $alamat, $status)
    {
        $result = $this->db->query("INSERT INTO tbl_user(id_user, `password`, nama_user, id_fakultas, id_prodi, alamat, `status`)
        VALUES('{$id_user}', '{$password}', '{$nama_user}', '{$id_fakultas}', '{$id_prodi}', '{$alamat}', '{$status}')");
    }

    public function updateUser($password, $nama_user, $id_fakultas, $id_prodi, $alamat, $status, $id_user)
    {
        $result = $this->db->query("UPDATE tbl_user SET `password` = '{$password}', nama_user = '{$nama_user}',
        id_fakultas = '{$id_fakultas}', id_prodi = '{$id_prodi}', alamat = '{$alamat}', `status` = '{$status}' WHERE id_user = '{$id_user}'");
    }

    public function deleteUser($id_user)
    {
        $result = $this->db->query("DELETE FROM tbl_user WHERE id_user = '{$id_user}'");
    }

    public function createAdmins($username, $password, $status)
    {
        $result = $this->db->query("INSERT INTO tbl_admin (username, `password`, `status`) VALUES ('{$username}', '{$password}', '{$status}')");
    }

    public function updateAdmins($username, $password, $status, $id_admin)
    {
        $result = $this->db->query("UPDATE tbl_admin SET username = '{$username}', `password` = '{$password}', `status` = '{$status}' WHERE id_admin = '{$id_admin}'");
    }

    public function deleteAdmins($id_admin)
    {
        $result = $this->db->query("DELETE FROM tbl_admin WHERE id_admin = '{$id_admin}'");
    }
}