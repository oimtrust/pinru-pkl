<div class="navbar-fixed z-depth-1">
    <nav class="cyan accent-2" role="navigation">
        <div class="nav-wrapper container">
            <a href="<?php $baseUrl;?>index.php" class="purple-text">Peminjaman Ruang</a>
            <a href="#" class="dropdown-button right purple-text" data-activates="menu-right">Login <i class="right mdi mdi-chevron-down"></i></a>
            <ul id='menu-right' class='dropdown-content'>
                <!-- <li><a href="<?php //$baseUrl; ?>index.php?page=#">Profil</a></li> -->
                <li><a href="<?php $baseUrl; ?>index.php?page=staff&action=login">Dosen/Staff</a></li>
                <li><a href="<?php $baseUrl; ?>index.php?page=approve&action=login">Approval</a></li>
            </ul>
        </div>
    </nav>
</div>