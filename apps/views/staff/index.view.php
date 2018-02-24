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
            } elseif (isset($_GET['accepted'])) {
                ?>
                <div class="row alert_box">
                    <div class="col s12">
                        <div class="card green darken-2">
                            <div class="row">
                                <div class="col s9">
                                    <div class="card-content white-text">
                                        Selamat! Peminjaman DITERIMA! Anda bisa melihat daftar <i>history</i> <a href="<?php $baseUrl; ?>index.php?page=staff&action=history" class="yellow-text">Disini</a>
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

            } elseif (isset($_GET['denied'])) {
                ?>
                <div class="row alert_box">
                    <div class="col s12">
                        <div class="card orange darken-2">
                            <div class="row">
                                <div class="col s9">
                                    <div class="card-content white-text">
                                        Maaf! Peminjaman DITOLAK! Anda bisa melihat daftar <i>history</i> <a href="<?php $baseUrl; ?>index.php?page=staff&action=history" class="yellow-text">Disini</a>
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
            <form class="col s12" action="" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="id_user" value="<?php echo $rowUser->id_user; ?>" id="id_user" readonly onkeypress="return onlyNumber(event)" class="validate">
                        <label for="id_user">NIDN/NIK</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="fullname" value="<?php echo $rowUser->nama_user; ?>" readonly class="validate">
                        <label for="fullname">Nama Lengkap</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <?php
                        $id_ruang = $connect->execute("SELECT * FROM tbl_ruang WHERE id_ruang ORDER BY id_ruang ASC");
                        $row_count = $id_ruang->num_rows;
                        ?>
                        <select name="id_ruang" class="id_ruang">
                            <option value="" disabled="disabled" selected>Pilih Ruang</option>
                            <?php
                            if ($row_count > 0) {
                                while ($row = $id_ruang->fetch_object()) {
                                    echo '<option value="' . $row->id_ruang . '">' . $row->nama_ruang . '</option>';
                                }
                            } else {
                                echo '<option value="">Nama ruang tidak tersedia</option>';
                            }
                            ?>
                        </select>
                        <label>Pilih Ruang</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <?php
                        $id_hari = $connect->execute("SELECT * FROM tbl_hari WHERE id_hari ORDER BY id_hari ASC");
                        $row_count = $id_hari->num_rows;
                        ?>
                        <select name="id_hari" class="id_hari">
                            <option value="" disabled="disabled" selected>Pilih Hari</option>
                            <?php
                            if ($row_count > 0) {
                                while ($row = $id_hari->fetch_object()) {
                                    echo '<option value="' . $row->id_hari . '">' . $row->nama_hari . '</option>';
                                }
                            } else {
                                echo '<option value="">Hari tidak tersedia</option>';
                            }
                            ?>
                        </select>
                        <label>Pilih Hari</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="date" class="datepicker" name="tgl_pinjam" id="tgl_pinjam">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="timepicker" name="jam_awal" id="jam_awal">
                        <label for="jam_awal">Jam Awal</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="timepicker" name="jam_akhir" id="jam_akhir">
                        <label for="jam_akhir">Jam Akhir</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="keterangan" name="keterangan" class="materialize-textarea textarea"></textarea>
                        <label for="keterangan">Keterangan</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button  type="submit" name="btn_borrow" class="waves-effect waves-light btn col s12">Pinjam</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function($){
        $(function(){

            $('select').material_select();
            
            $('.alert_close').click(function(){
                $( ".alert_box" ).fadeOut( "slow", function() {
                });
            });

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
            });

            $('.timepicker').pickatime({
                default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                twelvehour: false, // Use AM/PM or 24-hour format
                donetext: 'OK', // text for done-button
                cleartext: 'Clear', // text for clear-button
                canceltext: 'Cancel', // Text for cancel-button
                autoclose: false, // automatic close timepicker
                ampmclickable: true, // make AM PM clickable
                aftershow: function(){} //Function for after opening timepicker
            });

            $('.textarea').trigger('autoresize');

        }); // end of document ready
    })(jQuery); // end of jQuery name space

    function onlyNumber(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>
