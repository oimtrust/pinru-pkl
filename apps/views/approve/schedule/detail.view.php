<div class="container">
    <form method="post">
        <div class="row">
            <div class="col s4">
            <div class="card">
                <div class="card-image">
                <img src="<?php $baseUrl; ?>public/img/office.jpg">
                <span class="card-title"><?php echo $detailPinjam->fullname; ?></span>
                <a href="<?php $baseUrl; ?>index.php?page=home&action=showroom&room_id=<?php echo $detailPinjam->id_ruang; ?>" class="btn-floating btn-large halfway-fab waves-effect waves-light tooltip red" title="Lihat Ruang"><i class="mdi mdi-sofa"></i></a>
                </div>
                <div class="card-content">
                    <h5><?php echo $detailPinjam->acara; ?></h5>
                    <p>
                        <?php echo $detailPinjam->keterangan; ?>
                    </p>
                </div>
            </div>

            <div class="card-panel  orange lighten-5">
                <h5 >INSTANSI</h5>
                <span><?php echo $detailPinjam->nama_instansi; ?></span>
            </div>

            <div class="card-panel  orange lighten-4">
                <h5 >RUANG YANG DIPINJAM</h5>
                <span ><?php echo $detailPinjam->nama_ruang; ?></span>
            </div>

            <div class="card-panel  orange lighten-3">
                <h5 >HARI</h5>
                <span ><?php echo $detailPinjam->hari; ?></span>
            </div>

            <div class="card-panel  orange lighten-2">
                <h5 >TANGGAL MULAI</h5>
                <span ><?php echo $detailPinjam->tgl_awal; ?></span>
            </div>

            <div class="card-panel orange lighten-1">
                <h5 >TANGGAL AKHIR</h5>
                <span ><?php echo $detailPinjam->tgl_akhir; ?></span>
            </div>

            <div class="row right">
                <button type="submit" name="btn_reject" class="waves-effect waves-light btn-large btn-floating red accent-3 tooltip" title="DITOLAK"><i class="mdi mdi-close-circle-outline"></i></button>
                <button type="submit" name="btn_accept" class="waves-effect waves-light btn-large btn-floating green accent-3 tooltip" title="DITERIMA"><i class="mdi mdi-check-circle-outline"></i></button>
            </div>
            </div>
        </div>
    </form>
</div>

<script>
    tippy('.tooltip', {
        placement: 'left',
        animation: 'scale',
        theme: 'menu light',
        trigger: 'click',
        duration: 1000,
        arrow: true
    })
</script>