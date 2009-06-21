<?php
require('../init.php');
require('cal-init.php');

$udalost=get_event_data($id.".cal");

$smarty->assign("titulek","Kalendáø - zadat novou událost");
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-add.tpl');
$smarty->display('paticka.tpl');


?>
