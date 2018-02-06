<?php
define('RESTRICTED', 1);

//Ensure that a session exists (just in case)
if (!session_id()) {
    session_start();
}

require 'apps/config/app.php';
require_once 'apps/model/Connection.php';
require_once 'apps/model/Staff.php';

$page = (!empty($_GET['page'])) ? $_GET['page'] : null;
$action = (!empty($_GET['action'])) ? $_GET['action'] : null;

$connect        = new Connection();
$staff          = new Staff();

switch ($page) {
    case 'home':
        if ($action == 'index') {
            require 'home.php';
        }
        else {
            require 'error/404.php';
        }
        break;
    
    case 'staff':
        if ($action == 'login') {
            require 'staff/auth/login.php';
        } elseif ($action == 'logout') {
            require 'staff/auth/logout.php';
        } elseif ($action == 'home') {
            require 'staff/index.php';
        } elseif ($action == 'history') {
            require 'staff/history.php';
        } else {
            require 'error/404.php';
        }
        break;

    case 'approve':
        if ($action == 'login') {
            require 'approve/auth/login.php';
        } elseif ($action == 'logout') {
            require 'approve/auth/logout.php';
        } elseif ($action == 'home') {
            require 'approve/index.php';
        } else {
            require 'error/404.php';
        }
        break;
    
    default:
        require 'home.php';
        break;
}