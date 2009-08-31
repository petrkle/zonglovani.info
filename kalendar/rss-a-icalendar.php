<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Nastavení RSS a iCalendar");


$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-napoveda.tpl');
$smarty->display('paticka.tpl');

?>
