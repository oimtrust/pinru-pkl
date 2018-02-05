<div class="navbar-fixed z-depth-1">
    <nav class="cyan accent-2" role="navigation">
        <div class="nav-wrapper container">
            <a href="#" data-activates="nav-mobile" class="button-collapse show-on-large"><i class="mdi mdi-menu"></i></a>
            <a href="#" class="dropdown-button right" data-activates="menu-right"><i class="right mdi mdi-dots-vertical"></i></a>
            <ul id='menu-right' class='dropdown-content'>
                <li><a href="<?php $baseUrl; ?>index.php?page=staff&action=logout">Keluar</a></li>
            </ul>
        </div>
    </nav>
</div>

<ul id="nav-mobile" class="side-nav">
    <li><div class="user-view">
            <div class="background">
                <img class="responsive-img" src="<?php $baseUrl; ?>public/img/laptop.jpg">
            </div>
            <a href="#"><img class="circle" src="<?php $baseUrl; ?>public/img/logo.png"></a>
            <span class="card-title  orange-text text-darken-4">
                Peminjaman Ruang
            </span>
        </div>
    </li>
    <li><a href="<?php $baseUrl; ?>index.php?page=staff&action=home" class="waves-effect"><i class="mdi mdi-view-dashboard small red-text"></i>Dashboard</a></li>
    <li><div class="divider"></div></li>
    <li><a href="<?php $baseUrl; ?>index.php?page=staff&action=home" class="waves-effect"><i class="mdi mdi-sofa small blue-text"></i>Pinjam Ruang</a></li>
    <li><a href="<?php $baseUrl; ?>index.php?page=staff&action=history" class="waves-effect"><i class="mdi mdi-history small purple-text"></i>Daftar Riwayat</a></li>

</ul>

<script type="text/javascript">
    (function($){
        $(function(){

            

        }); // end of document ready
    })(jQuery); // end of jQuery name space
</script>
