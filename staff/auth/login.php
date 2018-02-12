<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

if (!isset($_SESSION)) {
    session_start();
} 

//if logged in
if (isset($_SESSION['username'])) {
    $connect->redirect($baseUrl . "index.php?page=staff&action=home");
    exit;
}

if (isset($_POST['btn_login'])) {
    $id_user        = $_POST['id_user'];
    $password       = md5($_POST['password']);

    if ($id_user == '') {
        $error[]    = "NIDN masih kosong";
    } elseif ($password == '') {
        $error[]    = "Password masih kosong";
    } else {
        $checkUser  = $connect->execute("SELECT * FROM tbl_user WHERE id_user = '{$id_user}'");

        if ($checkUser->num_rows == 0) {
            $error[]    = "NIDN tidak terdaftar";
        } else {
            $loginUser = $checkUser->fetch_object();
            if ($password == $loginUser->password) {
                $_SESSION['id_user']    = $loginUser->id_user;
                $connect->redirect($baseUrl.'index.php?page=staff&action=home');
                exit;
            } else {
                $error[]    = "Password anda salah";
            }
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/staff/login.view.php";
include "apps/views/layouts/footer.view.php";