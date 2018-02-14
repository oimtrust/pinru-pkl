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
            }
            ?>
            <!-- End Alert box -->
            <form class="col s12" action="" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" readonly name="id_peminjaman" value="<?php echo $detailBorrow->id_peminjaman; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="alasan" name="alasan" class="materialize-textarea textarea"></textarea>
                        <label for="alasan">Alasan</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button  type="submit" name="btn_denied" class="waves-effect waves-light btn col s12 red">Tolak</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function($){
        $(function(){
            
            $('.alert_close').click(function(){
                $( ".alert_box" ).fadeOut( "slow", function() {
                });
            });

            $('.textarea').trigger('autoresize');

        }); // end of document ready
    })(jQuery); // end of jQuery name space
</script>
