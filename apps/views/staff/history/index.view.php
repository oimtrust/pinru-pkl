<div class="container">
    <?php
    if (isset($error)) {
        foreach ($error as $error) {
            ?>
            <div class="row alert_box">
                <div class="col s12">
                    <div class="card red darken-2">
                        <div class="row">
                            <div class="col s9">
                                <div class="card-content white-text">
                                    <?php echo $error; ?>
                                </div>
                            </div>
                            <div class="col s3 white-text">
                                <i class="mdi mdi-close close right alert_close" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }
    } elseif (isset($_GET['error'])) {
        ?>
            <div class="row alert_box">
                <div class="col s12">
                    <div class="card red darken-2">
                        <div class="row">
                            <div class="col s9">
                                <div class="card-content white-text">
                                    Peringatan! Anda harus memilih data untuk di ubah!
                                </div>
                            </div>
                            <div class="col s3 white-text">
                                <i class="mdi mdi-close close right alert_close" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        } elseif (isset($_GET['updated'])) {
            ?>
                <div class="row alert_box">
                    <div class="col s12">
                        <div class="card green darken-2">
                            <div class="row">
                                <div class="col s9">
                                    <div class="card-content white-text">
                                        Selamat! Perubahan data berhasil.
                                    </div>
                                </div>
                                <div class="col s3 white-text">
                                    <i class="mdi mdi-close close right alert_close" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

            } elseif (isset($_GET['deleted'])) {
                ?>
                <div class="row alert_box">
                    <div class="col s12">
                        <div class="card yellow darken-2">
                            <div class="row">
                                <div class="col s9">
                                    <div class="card-content white-text">
                                        Selamat! Data berhasil dihapus.
                                    </div>
                                </div>
                                <div class="col s3 white-text">
                                    <i class="mdi mdi-close close right alert_close" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

            }
            ?>

    <!--Start Fixed Action Button-->
    <!-- <div class="fixed-action-btn">
        <a href="<?php //$baseUrl; ?>admin.php?page=home&action=user-create" class="btn-floating btn-large green tippy" title="Tambah Data">
        <i class="large mdi mdi-pen"></i>
        </a>
    </div> -->
    <!--End Fixed Action Button-->

    <form method="post">
        <div class="row">
            <div class="right">
                <div class="input-field inline">
                    <input id="search" type="text" name="search" class="validate">
                    <label for="search">Cari Tanggal</label>
                </div>
                <button name="btn_search" type="submit" class="btn btn-floating pink accent-3 waves-light waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cari"><i class="mdi mdi-account-search"></i> </button>
            </div>
        </div>

        <div class="row">
            <table class="responsive-table highlight">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>NIDN/NIK</th>
                    <th>Nama</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jam Awal</th>
                    <th>Jam Akhir</th>
                    <th>Status</th>
                    <th>Alasan</th>
                    <th>Tanggal Diproses</th>
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
                        pinjam.alasan,
                        pinjam.updated_at
                        FROM 
                        tbl_peminjaman AS pinjam 
                        LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                        LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                        LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari WHERE pinjam.id_user = '{$userLogin}'
                        ORDER BY pinjam.updated_at DESC LIMIT $position, $limit");

                $no = 1 + $position;

                if (isset($_POST['btn_search'])) {
                    $date = $_POST['search'];

                    if ($date == '') {
                        $error[] = "Tidak ada data yang anda cari";
                    } else {
                        if ($date != '') {
                            $query = $connect->execute("SELECT 
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
                                    pinjam.alasan,
                                    pinjam.updated_at
                                    FROM 
                                    tbl_peminjaman AS pinjam 
                                    LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                                    LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                                    LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari
                                    WHERE pinjam.tgl_pinjam LIKE '%$date%'");
                        } else {
                            $query = $connect->execute("SELECT 
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
                                    pinjam.alasan,
                                    pinjam.updated_at
                                    FROM 
                                    tbl_peminjaman AS pinjam 
                                    LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                                    LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                                    LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari WHERE pinjam.id_user = '{$userLogin}'
                                    ORDER BY pinjam.updated_at DESC LIMIT $position, $limit");
                        }
                    }
                } else {
                    $query = $connect->execute("SELECT 
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
                        pinjam.alasan,
                        pinjam.updated_at
                        FROM 
                        tbl_peminjaman AS pinjam 
                        LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                        LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                        LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari WHERE pinjam.id_user = '{$userLogin}'
                        ORDER BY pinjam.updated_at DESC LIMIT $position, $limit");
                }

                $check_search = $query->num_rows;

                if ($check_search < 1) {
                    ?>
                    <tr>
                        <td colspan="8" class="center">Data Tidak Ditemukan</td>
                    </tr>
                    <?php

                } else {
                    while ($data = $query->fetch_object()) {
                        if ($data->status == 'DITERIMA') {
                            $color = 'green';
                        } elseif ($data->status == 'DITOLAK') {
                            $color = 'red';
                        } elseif ($data->status == 'MENUNGGU') {
                            $color = 'yellow';
                        } else {
                            $color = 'grey';
                        }
                        ?>
                        <tr class="<?php if ($no % 2 == 0) {
                                        echo "odd";
                                    } else {
                                        echo "even";
                                    } ?>">
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data->id_user; ?></td>
                            <td><?php echo $data->nama_user; ?></td>
                            <td><?php echo $data->nama_ruang; ?></td>
                            <td><?php echo $data->nama_hari; ?></td>
                            <td><?php echo $data->tgl_pinjam; ?></td>
                            <td><?php echo $data->jam_awal; ?></td>
                            <td><?php echo $data->jam_akhir; ?></td>
                            <td class="<?php echo $color;?>"><?php echo $data->status; ?></td>
                            <td><?php echo $data->alasan;?></td>
                            <td><?php echo $data->updated_at; ?></td>
                            <!-- <td>
                                <a href="<?php $baseUrl; ?>admin.php?page=staff&action=history-update&update_id=<?php echo $data->id_user; ?>" class="btn btn-floating amber darken-3 waves-effect waves-light tippy" title="Ubah"><i class="mdi mdi-pencil"></i> </a>
                                <a href="<?php $baseUrl; ?>admin.php?page=staff&action=history-delete&delete_id=<?php echo $data->id_user; ?>" class="btn btn-floating btn-delete red darken-3 waves-effect waves-light tippy" title="Hapus"><i class="mdi mdi-delete-empty"></i> </a>
                            </td> -->
                        </tr>
                        <?php
                        $no++;
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            $amount_data = $connect->execute("SELECT 
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
                        pinjam.alasan,
                        pinjam.updated_at
                        FROM 
                        tbl_peminjaman AS pinjam 
                        LEFT JOIN tbl_user AS user ON pinjam.id_user = user.id_user
                        LEFT JOIN tbl_ruang AS ruang ON pinjam.id_ruang = ruang.id_ruang
                        LEFT JOIN tbl_hari AS hari ON pinjam.id_hari = hari.id_hari WHERE pinjam.id_user = '{$userLogin}'
                        ORDER BY pinjam.updated_at DESC");
            $rows = $amount_data->num_rows;

            $amount_page = ceil($rows / $limit);

            if ($pagination > 1) {
                $link = $pagination - 1;
                $prev = "<a href='" . $baseUrl . "index.php?page=staff&action=history&pagination=" . $link . "' class='btn purple'><i class='white-text mdi mdi-chevron-double-left'></i></a>";
            } else {
                $prev = "<a href='#' class='btn purple'><i class='white-text mdi mdi-chevron-double-left'></i></a>";
            }

            if ($pagination < $amount_page) {
                $link = $pagination + 1;
                $next = "<a href='" . $baseUrl . "index.php?page=staff&action=history&pagination=" . $link . "' class='btn purple'><i class='white-text mdi mdi-chevron-double-right'></i></a>";
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

    $('.btn-delete').on('click',function(){
        var getLink = $(this).attr('href');

        swal({
            title: 'Hapus Daftar Riwayat',
            text: 'Apakah anda yakin?',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        },function(){
            window.location.href = getLink
        });

        return false;
    });
</script>
