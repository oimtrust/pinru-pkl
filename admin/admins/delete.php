<?php
try {
    $id_admin = $_GET['delete_id'];
    if ($adminMastering->deleteAdmins($id_admin)) {

    }
    $adminMastering->redirect($baseUrl . 'admin.php?page=home&action=admins&deleted');
} catch (Exception $exception) {
    echo $exception->getMessage();
}