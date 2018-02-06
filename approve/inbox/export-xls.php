<?php
//this function for sending raw excel data
header("Content-type: application/vnd-ms-excel");

$now = date('Y-m-d');

//definition name of file
header("Content-Disposition: attachment; filename=data-inbox-'{$now}'.xls");
?>

<table border="1">
    <tr>
        <th>No.</th>
        <th>NIDN/NIK</th>
        <th>Nama</th>
        <th>Ruang di Pinjam</th>
        <th>Hari</th>
        <th>Tanggal Pinjam</th>
        <th>Jam Awal</th>
        <th>Jam Akhir</th>
        <th>Status</th>
    </tr>
    <?php
    $query  = $connect->execute("SELECT 
                        pinjam.id_user,
                        user.nama_user,
                        pinjam.id_ruang,
                        ruang.nama_ruang,
                        pinjam.id_hari,
                        hari.nama_hari,
                        pinjam.tgl_pinjam,
                        pinjam.jam_awal,
                        pinjam.jam_akhir,
                        pinjam.status,
                        pinjam.updated_at
                        FROM 
                        tbl_peminjaman AS pinjam 
                        LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                        LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                        LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari
                        ORDER BY pinjam.updated_at");
    $no     = 1;

    while ($data = $query->fetch_object()) {
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $data->id_user;?></td>
            <td><?php echo $data->nama_user;?></td>
            <td><?php echo $data->nama_ruang;?></td>
            <td><?php echo $data->nama_hari;?></td>
            <td><?php echo $data->tgl_pinjam;?></td>
            <td><?php echo $data->jam_awal;?></td>
            <td><?php echo $data->jam_akhir;?></td>
            <td><?php echo $data->status;?></td>
        </tr>
        <?php
        $no++;
    }
    ?>
</table>