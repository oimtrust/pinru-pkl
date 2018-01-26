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
    <div class="fixed-action-btn">
        <a href="<?php $baseUrl; ?>admin.php?page=home&action=room-create" class="btn-floating btn-large green tippy" title="Tambah Data">
        <i class="large mdi mdi-pen"></i>
        </a>
    </div>
    <!--End Fixed Action Button-->

    <form method="post">
        <div class="row">
            <div class="right">
                <div class="input-field inline">
                    <input id="search" type="text" name="search" class="validate">
                    <label for="search">Cari Ruang</label>
                </div>
                <button name="btn_search" type="submit" class="btn btn-floating pink accent-3 waves-light waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cari"><i class="mdi mdi-account-search"></i> </button>
            </div>
        </div>

        <div class="row">
            <table class="responsive-table highlight">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Ruang</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
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

                $query = $connect->execute("SELECT * FROM tbl_ruang ORDER BY updated_at DESC LIMIT $position, $limit");

                $no = 1 + $position;

                if (isset($_POST['btn_search'])) {
                    $name_of_room = $_POST['search'];

                    if ($name_of_room == '') {
                        $error[] = "Tidak ada data yang anda cari";
                    } else {
                        if ($name_of_room != '') {
                            $query = $connect->execute("SELECT * FROM tbl_ruang WHERE nama_ruang LIKE '%$name_of_room%'");
                        } else {
                            $query = $connect->execute("SELECT * FROM tbl_ruang ORDER BY updated_at DESC LIMIT $position, $limit");
                        }
                    }
                } else {
                    $query = $connect->execute("SELECT * FROM tbl_ruang ORDER BY updated_at DESC LIMIT $position, $limit");
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
                        ?>
                        <tr class="<?php if ($no % 2 == 0) {
                                        echo "odd";
                                    } else {
                                        echo "even";
                                    } ?>">
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data->nama_ruang; ?></td>
                            <td><?php echo $data->updated_at; ?></td>
                            <td>
                                <a href="<?php $baseUrl; ?>admin.php?page=home&action=room-update&update_id=<?php echo $data->id_ruang; ?>" class="btn btn-floating amber darken-3 waves-effect waves-light tippy" title="Ubah"><i class="mdi mdi-pencil"></i> </a>
                                <a href="<?php $baseUrl; ?>admin.php?page=home&action=room-delete&delete_id=<?php echo $data->id_ruang; ?>" class="btn btn-floating btn-delete red darken-3 waves-effect waves-light tippy" title="Hapus"><i class="mdi mdi-delete-empty"></i> </a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            $amount_data = $connect->execute("SELECT * FROM tbl_ruang");
            $rows = $amount_data->num_rows;

            $amount_page = ceil($rows / $limit);

            if ($pagination > 1) {
                $link = $pagination - 1;
                $prev = "<a href='" . $baseUrl . "admin.php?page=home&action=room&pagination=" . $link . "' class='btn purple'><i class='white-text mdi mdi-chevron-double-left'></i></a>";
            } else {
                $prev = "<a href='#' class='btn purple'><i class='white-text mdi mdi-chevron-double-left'></i></a>";
            }

            if ($pagination < $amount_page) {
                $link = $pagination + 1;
                $next = "<a href='" . $baseUrl . "admin.php?page=home&action=room&pagination=" . $link . "' class='btn purple'><i class='white-text mdi mdi-chevron-double-right'></i></a>";
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
            title: 'Hapus Ruang',
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
