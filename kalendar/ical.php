<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

header('Content-Type: text/calendar; charset=utf-8');
$smarty->assign('events',get_all_cal_data());
$smarty->display('kalendar-ical.tpl');
?>