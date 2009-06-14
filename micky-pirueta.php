<?php
require('init.php');

$smarty->assign("titulek","Pirueta");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-pirueta.tpl');
$smarty->display('paticka.tpl');

?>
