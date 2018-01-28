<?php
// include_once '../apps/model/Connection.php';

// $connect = new Connection();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id_fakultas'])  && !empty($_GET['id_fakultas'])) {
    $prodi = $connect->execute("SELECT * FROM tbl_prodi WHERE id_fakultas = ".$_GET['id_fakultas']." ORDER BY nama_prodi ASC");

    $rowCount = $prodi->num_rows;

    $return  = [];
    $i      = 0;

    if ($rowCount > 0) {
        $return[$i] = [
            'id'    => '',
            'text'  => 'Pilih Prodi',
        ];
        while ($row = $prodi->fetch_object()) {
            $i++;
            $return[$i] = [
                'id'    => $row->id_prodi,
                'text'  => $row->nama_prodi,
            ];
        }
    }
    echo json_encode($return);
}