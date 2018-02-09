<div class="container">
    <form method="post">
        <div class="row">
            <div class="col s6">
            <div class="card">
                <div class="card-image">
                <img src="<?php $baseUrl; ?>public/img/office.jpg">
                <span class="card-title"><?php echo $detailPinjam->nama_user; ?></span>
                </div>
                <div class="card-content">
                    <h5><?php echo $detailPinjam->nama_ruang; ?></h5>
                    <p>
                        <?php echo $detailPinjam->keterangan; ?>
                    </p>
                </div>
            </div>

            <div class="card-panel  orange lighten-5">
                <h6 >HARI</h6>
                <h4 class="purple-text"><?php echo $detailPinjam->nama_hari; ?></h4>
            </div>

            <div class="card-panel  orange lighten-4">
                <h6>TANGGAL PEMINJAMAN</h6>
                <h4 class="purple-text"><?php echo $detailPinjam->tgl_pinjam; ?></h4>
            </div>

            <div class="card-panel  orange lighten-3">
                <h6>JAM AWAL PEMINJAMAN</h6>
                <h4 class="purple-text"><?php echo $detailPinjam->jam_awal; ?></h4>
            </div>

            <div class="card-panel  orange lighten-2">
                <h6>JAM AKHIR PEMINJAMAN</h6>
                <h4 class="purple-text"><?php echo $detailPinjam->jam_akhir; ?></h4>
            </div>

            <div class="card-panel orange lighten-1">
                <h6>STATUS</h6>
                <h4 class="purple-text"><?php echo $detailPinjam->status; ?></h4>
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