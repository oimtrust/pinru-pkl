<div class="container">
    <div class="row">
        <div class="col s12 m5 card z-depth-3">
            <!-- Start Alert box -->
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    ?>
                    <div class="row alert_box">
                        <div class="col s12 m12">
                            <div class="card red darken-2">
                                <div class="row">
                                    <div class="col s9">
                                        <div class="card-content white-text">
                                            <p><?php echo $error; ?></p>
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
            } elseif (isset($_GET['saved'])) {
                ?>
                <div class="row alert_box">
                    <div class="col s12">
                        <div class="card green darken-2">
                            <div class="row">
                                <div class="col s9">
                                    <div class="card-content white-text">
                                        Selamat! Penyimpanan data berhasil.
                                        Data bisa anda lihat <a href="<?php $baseUrl; ?>admin.php?page=home&action=user" class="yellow-text">Disini</a>
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
            <!-- End Alert box -->
            <form class="col s12 m12" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="id_user" id="id_user" onkeypress="return onlyNumber(event)" class="validate" autofocus>
                        <label for="id_user">NIDN/ NIK</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password" class="validate" >
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="nama_user" id="nama_user" class="validate" >
                        <label for="nama_user">Nama Lengkap</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <?php
                        $id_fakultas = $connect->execute("SELECT * FROM tbl_fakultas WHERE id_fakultas ORDER BY id_fakultas ASC");
                        $row_count = $id_fakultas->num_rows;
                        ?>
                        <select name="id_fakultas" class="id_fakultas">
                            <option value="" disabled="disabled" selected>Pilih Fakultas</option>
                            <?php
                            if ($row_count > 0) {
                                while ($row = $id_fakultas->fetch_object()) {
                                    echo '<option value="' . $row->id_fakultas . '">' . $row->nama_fakultas . '</option>';
                                }
                            } else {
                                echo '<option value="">Nama fakultas tidak tersedia</option>';
                            }
                            ?>
                        </select>
                        <label>Pilih Fakultas</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12" >
                        <select name="id_prodi" id="id_prodi">
                            <option value="" disabled selected>Prodi</option>
                        </select>
                        <label>Pilih Prodi</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                    <textarea id="alamat" name="alamat" class="materialize-textarea textarea"></textarea>
                    <label for="alamat">Alamat</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12" >
                        <select name="status" id="status">
                            <option value="" disabled selected>Status Dosen/Karyawan</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Tidak Tetap">Tidak Tetap</option>
                        </select>
                        <label>Pilih Status</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button  type="submit" name="btn_save" class="waves-effect waves-light btn col s12 blue">Simpan</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <a href="<?php $baseUrl?>admin.php?page=home&action=user" class="waves-effect waves-light btn right light-green accent-3">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('select').material_select();
        $('.id_fakultas').on('change', function() {
            var id_fakultas = $(this).val();
            if (id_fakultas) {
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: 'admin.php?page=home&action=user-select-prodi',
                    data: 'id_fakultas=' + id_fakultas,
                    success: function(html) {
                        var toAppend = '';
                        $.each(html, function(key, value) {
                            toAppend += '<option value="'+value.id+'">'+value.text+'</option>';
                        });
                        var $selectDropdown = $('#id_prodi').empty().html(' ');
                        $selectDropdown.append(toAppend);
                        $selectDropdown.trigger('contentChanged');
                        console.log(toAppend);
                    }
                });
            }
        });
        $('select').on('contentChanged', function() {
            $(this).material_select();
        });
    });

    function onlyNumber(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }

    (function($){
        $(function(){
            $('.textarea').trigger('autoresize');

            //For dialog box
            $('.alert_close').click(function(){
                $( ".alert_box" ).fadeOut( "slow", function() {
                });
            });

        }); // end of document ready
    })(jQuery); // end of jQuery name space
</script>