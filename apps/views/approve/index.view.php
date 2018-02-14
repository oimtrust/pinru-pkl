<div class="container">
    <div class="row">
        <div class="col s12 m3">
            <div class="card  blue">
                <div class="card-content white-text">
                    <span class="card-title"> <?php echo $rowInbox->total; ?> Kotak Masuk</span>
                    <p>
                        <i class="mdi mdi-email-open-outline large"></i>
                    </p>
                </div>
                <div class="card-action">
                    <a href="<?php $baseUrl; ?>index.php?page=approve&action=inbox" class="white-text"><i class="mdi mdi-account-search"></i> Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>