<?php
try {
    $id_fakultas = $_GET['delete_id'];
    if ($adminMastering->deleteFaculty($id_fakultas)) {

    }
    $adminMastering->redirect($baseUrl . 'admin.php?page=home&action=faculty&deleted');
} catch (Exception $exception) {
    echo $exception->getMessage();
}