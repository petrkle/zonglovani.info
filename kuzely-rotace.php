<?php
require('init.php');

$smarty->assign("titulek","Rotace kuželu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-rotace.tpl');
$smarty->display('paticka.tpl');

?>
