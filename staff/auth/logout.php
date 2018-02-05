<?php
session_start();
session_destroy();
$connect->redirect($baseUrl . 'index.php?page=staff&action=login');
exit;