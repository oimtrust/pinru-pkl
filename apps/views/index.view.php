<section id="form-schedule">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Keterangan : </span>
                        <span class="yellow-text">Warna Kuning : Peminjaman Menunggu</span> <br/>
                        <span class="green-text">Warna Hijau : Peminjaman Diterima</span> <br/>
                        <span class="red-text">Warna Merah : Peminjaman Ditolak</span> <br/>
                        <span class="grey-text">Warna Abu-Abu : Peminjaman Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <form method="post">
            <div class="row">
                <table class="responsive-table highlight">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Ruang</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jum'at</th>
                        <th>Sabtu</th>
                        <th>Minggu</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $limit = 5;
                    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : "";

                    if (empty($pagination)) {
                        $position = 0;
                        $pagination = 1;
                    } else {
                        $position = ($pagination - 1) * $limit;
                    }

                    $query = $connect->execute("SELECT 
                            pinjam.id_peminjaman,
                            pinjam.id_user,
                            user.nama_user,
                            pinjam.id_ruang,
                            ruang.nama_ruang,
                            pinjam.id_hari,
                            hari.nama_hari,
                            pinjam.tgl_pinjam,
                            pinjam.jam_awal,
                            pinjam.jam_akhir,
                            pinjam.keterangan,
                            pinjam.status
                            FROM tbl_peminjaman AS pinjam
                            LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                            LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                            LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari
                            ORDER BY pinjam.updated_at DESC LIMIT $position, $limit");

                    $no = 1 + $position;

                    $check_search = $query->num_rows;
                    while ($data = $query->fetch_object()) {
                        if ($data->status == 'DITERIMA') {
                            $color = "green-text";
                        } elseif ($data->status == 'DITOLAK') {
                            $color = "red-text";
                        } elseif ($data->status == 'MENUNGGU') {
                            $color = "yellow-text";
                        } else {
                            $color = "grey-text";
                        }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data->nama_ruang; ?></td>
                            <td>
                                <?php
                                if ($data->id_hari == '1') {
                                    ?>
                                    <a href="<?php $baseUrl;?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman; ?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data->id_hari == '2') {
                                    ?>
                                    <a href="<?php $baseUrl; ?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman; ?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data->id_hari == '3') {
                                    ?>
                                    <a href="<?php $baseUrl; ?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman; ?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data->id_hari == '4') {
                                    ?>
                                    <a href="<?php $baseUrl; ?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman; ?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data->id_hari == '5') {
                                    ?>
                                    <a href="<?php $baseUrl; ?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman; ?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data->id_hari == '6') {
                                    ?>
                                    <a href="<?php $baseUrl; ?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman; ?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data->id_hari == '7') {
                                    ?>
                                    <a href="<?php $baseUrl; ?>index.php?page=home&action=detail&detail_id=<?php echo $data->id_peminjaman;?>" class="tippy <?php echo $color;?>" title="Lihat Detail">
                                        <?php
                                        echo $data->jam_awal . ' - </br>';
                                        echo $data->jam_akhir;
                                        ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                $amount_data = $connect->execute("SELECT 
                            pinjam.id_peminjaman,
                            pinjam.id_user,
                            user.nama_user,
                            pinjam.id_ruang,
                            ruang.nama_ruang,
                            pinjam.id_hari,
                            hari.nama_hari,
                            pinjam.tgl_pinjam,
                            pinjam.jam_awal,
                            pinjam.jam_akhir,
                            pinjam.keterangan,
                            pinjam.status
                            FROM tbl_peminjaman AS pinjam
                            LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                            LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                            LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari
                            ORDER BY pinjam.updated_at DESC");
                $rows = $amount_data->num_rows;

                $amount_page = ceil($rows / $limit);

                if ($pagination > 1) {
                    $link = $pagination - 1;
                    $prev = "<a href='" . $baseUrl . "index.php?&pagination=" . $link . "' class='btn purple'><i class='white-text mdi mdi-chevron-double-left'></i></a>";
                } else {
                    $prev = "<a href='#' class='btn purple'><i class='white-text mdi mdi-chevron-double-left'></i></a>";
                }

                if ($pagination < $amount_page) {
                    $link = $pagination + 1;
                    $next = "<a href='" . $baseUrl . "index.php?&pagination=" . $link . "' class='btn purple'><i class='white-text mdi mdi-chevron-double-right'></i></a>";
                } else {
                    $next = "<a href='#' class='btn purple'><i class='white-text mdi mdi-chevron-double-right'></i></a>";
                }

                echo "<ul class='pagination'>
                <li class='waves-effect left'>" . $prev . "</li>
                <li class='waves-effect right'>" . $next . "</li>
            </ul>";
                ?>
            </div>
        </form>
    </div>
</section>



<script type="text/javascript">
    $('.alert_close').click(function(){
        $( ".alert_box" ).fadeOut( "slow", function() {
        });
    });

    tippy('.tippy', {
        position: 'bottom',
        theme: 'light',
        animation: 'scale',
        duration: 1000,
        arrow: true
    });
</script>