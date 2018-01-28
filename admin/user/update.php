<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$admin_login = "";

//if not logged in
if (!isset($_SESSION['username'])) {
    $connect->redirect($baseUrl . "admin.php?page=home&action=login");
    exit;
}

//if logged in
$admin_login = "{$_SESSION['username']}";

//to retrive user data
$admin = $connect->execute("SELECT * FROM tbl_admin WHERE username = '{$admin_login}'");

if (isset($_GET['update_id']) && !empty($_GET['update_id'])) {
    $id_user = $_GET['update_id'];
    $stmt = $connect->execute("SELECT
                                user.id_user,
                                user.nama_user,
                                fakultas.id_fakultas,
                                fakultas.nama_fakultas,
                                prodi.id_prodi,
                                prodi.nama_prodi,
                                user.alamat,
                                user.status,
                                user.updated_at
                                FROM
                                tbl_user AS user
                                LEFT JOIN tbl_fakultas AS fakultas ON user.id_fakultas = fakultas.id_fakultas
                                LEFT JOIN tbl_prodi AS prodi ON user.id_prodi = prodi.id_prodi
                                WHERE user.id_user = '{$id_user}'");
    $detailUser = $stmt->fetch_object();
} else {
    $connect->redirect($baseUrl . 'admin.php?page=home&action=user&error');
}

if (isset($_POST['btn_update'])) {
    $id_user = $_POST['id_user'];
    $password = md5($_POST['password']);
    $nama_user = $_POST['nama_user'];
    $id_fakultas = $_POST['id_fakultas'];
    $id_prodi = $_POST['id_prodi'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    if ($id_user == '') {
        $error[] = "NIDN/ NIK masih kosong";
    } elseif (!is_numeric($id_user)) {
        $error[] = "NIDN/ NIK tidak valid";
    } elseif ($password == '') {
        $error[] = "Password masih kosong";
    } elseif ($nama_user == '') {
        $error[] = "Nama masih kosong";
    } elseif (empty($id_fakultas)) {
        $error[] = "Fakultas belum dipilih";
    } elseif (empty($id_prodi)) {
        $error[] = "Prodi belum dipilih";
    } elseif ($alamat == '') {
        $error[] = "Alamat masih kosong";
    } elseif ($status == '') {
        $error[] = "Status masih kosong";
    } else {
        try {
            if ($adminMastering->updateUser($password, $nama_user, $id_fakultas, $id_prodi, $alamat, $status, $id_user)) {

            }
            $adminMastering->redirect($baseUrl . 'admin.php?page=home&action=user&updated');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/user/update.view.php";
include "apps/views/layouts/footer.view.php";