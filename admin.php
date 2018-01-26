<?php
define('RESTRICTED', 1);

//Ensure that a session exists (just in case)
if (!session_id()) {
    session_start();
}

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require 'apps/config/app.php';
require_once 'apps/model/Connection.php';
require_once 'apps/model/AdminMastering.php';

$page = (!empty($_GET['page'])) ? $_GET['page'] : null;
$action = (!empty($_GET['action'])) ? $_GET['action'] : null;

$connect            = new Connection();
$adminMastering     = new AdminMastering();

switch ($page) {
    case 'home':
        if ($action == 'login') {
            require 'admin/auth/login.php';
        } elseif ($action == 'logout') {
            require 'admin/auth/logout.php';
        } elseif ($action == 'index') {
            require 'admin/index.php';
        } elseif ($action == 'faculty') {
            require 'admin/faculty/index.php';
        } elseif ($action == 'faculty-create') {
            require 'admin/faculty/create.php';
        } elseif ($action == 'faculty-update') {
            require 'admin/faculty/update.php';
        } elseif ($action == 'faculty-delete') {
            require 'admin/faculty/delete.php';
        } elseif ($action == 'prody') {
            require 'admin/prody/index.php';
        } elseif ($action == 'prody-create') {
            require 'admin/prody/create.php';
        } elseif ($action == 'prody-update') {
            require 'admin/prody/update.php';
        } elseif ($action == 'prody-delete') {
            require 'admin/prody/delete.php';
        } elseif ($action == 'room') {
            require 'admin/room/index.php';
        } elseif ($action == 'room-create') {
            require 'admin/room/create.php';
        } else {
            require 'error/404.php';
        }
        break;

    default:
        require 'admin/index.php';
        break;
}