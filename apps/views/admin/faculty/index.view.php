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
    <div class="row">
        <form method="post">
            <ul class="collapsible" data-collapsible="accordion">
            <?php
            $query = $connect->execute("SELECT * FROM tbl_fakultas ORDER BY updated_at DESC");
            while ($data = $query->fetch_object()) {
                ?>
                <li>
                <div class="collapsible-header"><?php echo $data->nama_fakultas; ?></div>
                <div class="collapsible-body">
                    <a href="<?php $baseUrl; ?>admin.php?page=home&action=faculty-update&update_id=<?php echo $data->id_fakultas; ?>" class="btn-floating btn-small waves-effect waves-light blue tippy" title="Ubah"><i class="mdi mdi-pencil"></i></a>
                    <a href="<?php $baseUrl; ?>admin.php?page=home&action=faculty-delete&delete_id=<?php echo $data->id_fakultas; ?>" class="btn-floating btn-delete btn-small waves-effect waves-light red tippy" title="Hapus"><i class="mdi mdi-delete-empty"></i></a>
                </div>
                <?php

            }
            ?>
            </ul>

            <div class="fixed-action-btn">
                <a href="<?php $baseUrl; ?>admin.php?page=home&action=faculty-create" class="btn-floating btn-large green">
                <i class="large mdi mdi-plus"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        tippy('.tippy', {
            placement: 'right',
            animation: 'scale',
            theme: 'light',
            duration: 1000,
            arrow: true
            })

        $('.collapsible').collapsible();

        $('.alert_close').click(function(){
            $( ".alert_box" ).fadeOut( "slow", function() {
            });
        });

        $('.btn-delete').on('click',function(){
            var getLink = $(this).attr('href');

            swal({
                title: 'Hapus Data Fakultas',
                text: 'Apakah anda yakin?',
                html: true,
                confirmButtonColor: '#d9534f',
                showCancelButton: true,
            },function(){
                window.location.href = getLink
            });

            return false;
        });
    });
</script>