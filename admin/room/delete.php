<?php
try {
    $id_ruang = $_GET['delete_id'];
    if ($adminMastering->deleteRoom($id_ruang)) {

    }
    $adminMastering->redirect($baseUrl . 'admin.php?page=home&action=room&deleted');
} catch (Exception $exception) {
    echo $exception->getMessage();
}