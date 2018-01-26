<?php
session_start();
session_destroy();
$connect->redirect($baseUrl . 'admin.php?page=home&action=login');
exit;