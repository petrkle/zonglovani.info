<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

header('Content-Type: text/calendar; charset=UTF-8');
$smarty->assign('events',get_all_cal_data());
$smarty->display('kalendar-ical.tpl');
print "\n";
