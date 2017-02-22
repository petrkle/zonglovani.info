<?php

require '../init.php';
require 'cal-init.php';
require '../func.php';

header('Content-Type: text/calendar; charset=UTF-8');
$smarty->assign('events', get_all_cal_data());
$calendar = preg_replace("/\n/", "\r\n", $smarty->fetch('kalendar-ical.tpl'));
print $calendar;

file_put_contents(ZS_DIR.'/tmp/zonglovani.ics', $calendar);
