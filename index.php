<?php
define('RESTRICTED', 1);

//Ensure that a session exists (just in case)
if (!session_id()) {
    session_start();
}

require 'apps/config/app.php';
require_once 'apps/model/Connection.php';
require_once 'apps/model/Staff.php';
require_once 'apps/model/Approve.php';

$page = (!empty($_GET['page'])) ? $_GET['page'] : null;
$action = (!empty($_GET['action'])) ? $_GET['action'] : null;

$connect        = new Connection();
$staff          = new Staff();
$approve        = new Approve();

switch ($page) {
    case 'home':
        if ($action == 'index') {
            require 'home.php';
        } elseif ($action == 'detail') {
            require 'detail.php';
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
        } elseif ($action == 'inbox') {
            require 'approve/inbox/index.php';
        } elseif ($action == 'room') {
            require 'approve/room.php';
        } elseif ($action == 'report') {
            require 'approve/report/chart.php';
        } elseif ($action == 'export-xls') {
            require 'approve/inbox/export-xls.php';
        } elseif ($action == 'denied') {
            require 'approve/inbox/denied.php';
        } elseif ($action == 'accepted') {
            require 'approve/inbox/accepted.php';
        } elseif ($action == 'inbox-process') {
            require 'approve/inbox/process.php';
        } elseif ($action == 'process-finish') {
            require 'approve/inbox/process-finish.php';
        } elseif ($action == 'schedule') {
            require 'approve/schedule/index.php';
        } elseif ($action == 'detail') {
            require 'approve/schedule/detail.php';
        } else {
            require 'error/404.php';
        }
        break;
    
    default:
        require 'home.php';
        break;
}