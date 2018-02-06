<div class="container">
    <form method="post">
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
    } ?>
      <div class="row right">
        <div class="col s12">
          <div class="input-field inline">
            <input id="search" name="search" type="text" class="validate">
            <label for="search" data-error="wrong" data-success="right">Cari Ruang</label>
          </div>
          <button type="submit" name="btn_search" title="Cari" class="tippy btn btn-floating waves-light waves-effect pink accent-2"><i class="mdi mdi-magnify"></i></button>
        </div>
      </div>
 
      <?php
        if (isset($_POST['btn_search'])) {
            $search = $_POST['search'];

            if ($search == '') {
                $error[] = "Kolom pencarian masih kosong!";
            } else {
                if ($search != '') {
                    $query = $connect->execute("SELECT * FROM tbl_ruang WHERE nama_ruang LIKE '%{$search}%'");
                } else {
                    $query = $connect->execute("SELECT * FROM tbl_ruang ORDER BY updated_at DESC");
                }
            }
        } else {
            $query = $connect->execute("SELECT * FROM tbl_ruang ORDER BY updated_at DESC");
        }

        $check_search = $query->num_rows;

        if ($check_search < 1) {
            ?>
        <div class="row">
          <div class="col s12">
            <div class="card-panel orange">
              <span class="white-text">
              Data Tidak Ada!
              </span>
            </div>
          </div>
        </div>
        <?php

    } else {
        while ($data = $query->fetch_object()) {
            if ($data->status == 'KOSONG') {
                $color = "green";
            } else {
                $color = "red";
            }
            ?>
          <div class="row">
            <div class="col s12">
              <div class="card-panel <?php echo $color; ?>">
                <span class="white-text">
                <?php echo $data->nama_ruang; ?>
                </span>
              </div>
            </div>
          </div>
          <?php

        }
    }
    ?>
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
</script>