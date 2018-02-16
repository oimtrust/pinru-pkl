<div class="navbar-fixed z-depth-1">
    <nav class="cyan accent-2" role="navigation">
        <div class="nav-wrapper container">
            <a href="#" data-activates="nav-mobile" class="button-collapse show-on-large"><i class="mdi mdi-menu"></i></a>
            <a href="#" class="dropdown-button right" data-activates="menu-right"><i class="right mdi mdi-dots-vertical"></i></a>
            <ul id='menu-right' class='dropdown-content'>
                <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=logout">Keluar</a></li>
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
    <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=home" class="waves-effect"><i class="mdi mdi-view-dashboard small green-text"></i>Dashboard</a></li>
    <li><div class="divider"></div></li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header">Kotak Masuk<i class="mdi mdi-chevron-down right"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=inbox">Semua Peminjaman<i class="mdi mdi-email-outline small blue-text"></i></a></li>
                <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=inbox-process">Proses Peminjaman<i class="mdi mdi-email-open-outline small pink-text"></i></a></li>
              </ul>
            </div>
          </li>
        </ul>
    </li>
    <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=room" class="waves-effect"><i class="mdi mdi-sofa small red-text"></i>Lihat Ruang</a></li>
    <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=schedule" class="waves-effect"><i class="mdi mdi-calendar-clock small purple-text"></i>Lihat Jadwal</a></li>
    <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=report" class="waves-effect"><i class="mdi mdi-chart-bar small orange-text"></i>Grafik</a></li>
</ul>

<script type="text/javascript">
    (function($){
        $(function(){

            

        }); // end of document ready
    })(jQuery); // end of jQuery name space
</script>
