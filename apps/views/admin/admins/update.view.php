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
                                        Data bisa anda lihat <a href="<?php $baseUrl; ?>admin.php?page=home&action=admins" class="yellow-text">Disini</a>
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
            <form class="col s12 m12" action="" method="post">
                <input type="hidden" name="id_admin" value="<?php echo $detailAdmin->id_admin; ?>">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="username" id="username" value="<?php echo $detailAdmin->username;?>" class="validate" autofocus>
                        <label for="username">Username</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="password" name="password" id="password" class="validate" autofocus>
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <select name="status">
                        <option value="<?php echo $detailAdmin->status;?>" selected><?php echo $detailAdmin->status;?></option>
                        <option value="admin">Admin</option>
                        <option value="approve">Approve</option>
                        </select>
                        <label>Status</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button  type="submit" name="btn_update" class="waves-effect waves-light btn col s12 blue">Ubah</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <a href="<?php $baseUrl; ?>admin.php?page=home&action=admins" class="waves-effect waves-light btn right light-green accent-3">Kembali</a>
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

            //For dialog box
            $('.alert_close').click(function(){
                $( ".alert_box" ).fadeOut( "slow", function() {
                });
            });

        }); // end of document ready
    })(jQuery); // end of jQuery name space
</script>