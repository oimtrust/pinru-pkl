<?php
define('RESTRICTED', 1);

//Ensure that a session exists (just in case)
if (!session_id()) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'apps/config/app.php';
require_once 'apps/model/Connection.php';

$page = (!empty($_GET['page'])) ? $_GET['page'] : null;
$action = (!empty($_GET['action'])) ? $_GET['action'] : null;

$connect = new Connection();

switch ($page) {
    case 'home':
        if ($action == 'login') {
            require 'admin/login.php';
        } elseif ($action == 'index') {
            require 'admin/index.php';
        } elseif ($action == 'faculty') {
            require 'admin/faculty/index.php';
        } elseif ($action == 'faculty-create') {
            require 'admin/faculty/create.php';
        }
        else {
            require 'error/404.php';
        }
        break;

    default:
        require 'admin/index.php';
        break;
}