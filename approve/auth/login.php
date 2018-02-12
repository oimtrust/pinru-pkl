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
    $connect->redirect($baseUrl . "index.php?page=approve&action=home");
    exit;
}

if (isset($_POST['btn_login'])) {
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);

    if ($username == '') {
        $error[]    = "Username masih kosong";
    } elseif ($password == '') {
        $error[]    = "Password masih kosong";
    } else {
        $check = $connect->execute("SELECT * FROM tbl_admin WHERE username = '{$username}'");

        if ($check->num_rows == 0) {
            $error[] = "Username yang anda inputkan tidak terdaftar";
        } else {
            $login = $check->fetch_object();
            if ($password == $login->password && $login->status == 'approve') {
                $_SESSION['username'] = $login->username;
                $connect->redirect($baseUrl . 'index.php?page=approve&action=home');
                exit;
            } else {
                $error[] = "Password anda salah";
            }
        }
    }
}

include "apps/views/layouts/header.view.php";
include "apps/views/approve/login.view.php";
include "apps/views/layouts/footer.view.php";