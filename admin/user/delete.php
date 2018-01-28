<?php
try {
    $id_user = $_GET['delete_id'];
    if ($adminMastering->deleteUser($id_user)) {

    }
    $adminMastering->redirect($baseUrl . 'admin.php?page=home&action=user&deleted');
} catch (Exception $exception) {
    echo $exception->getMessage();
}