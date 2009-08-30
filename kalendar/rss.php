<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

header('Content-Type: application/rss+xml');
$smarty->assign('events',get_future_data());
$smarty->display('kalendar-rss.tpl');
?>
