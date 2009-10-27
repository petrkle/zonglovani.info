<?php
require('init.php');

$smarty->assign("titulek","Žonglování s míčky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');

?>
