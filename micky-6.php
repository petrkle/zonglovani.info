<?php

require('init.php');

$smarty->assign("titulek","Žonglování se šesti míčky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-6.tpl');
$smarty->display('paticka.tpl');

?>
