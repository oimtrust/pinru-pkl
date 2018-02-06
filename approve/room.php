<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

include "apps/views/layouts/header.view.php";
include "apps/views/approve/menu.view.php";
include "apps/views/approve/room.view.php";
include "apps/views/layouts/footer.view.php";