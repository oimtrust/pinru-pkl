<?php
if (defined('RESTRICTED')) {
} else {
    exit('No direct script access allowed!');
}

include "apps/views/layouts/header.view.php";
include "apps/views/admin/menu.view.php";
include "apps/views/admin/index.view.php";
include "apps/views/layouts/footer.view.php";