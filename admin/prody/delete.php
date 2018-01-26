<?php
try {
    $id_prodi = $_GET['delete_id'];
    if ($adminMastering->deletePrody($id_prodi)) {

    }
    $adminMastering->redirect($baseUrl . 'admin.php?page=home&action=prody&deleted');
} catch (Exception $exception) {
    echo $exception->getMessage();
}