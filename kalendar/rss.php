<?php

require '../init.php';
require 'cal-init.php';
require '../func.php';

header('Content-Type: application/xml');
$smarty->assign('events', get_future_data());

if (isset($_GET['v'])) {
    $smarty->display('kalendar-rss2.tpl');
} else {
    $smarty->display('kalendar-rss.tpl');
}
