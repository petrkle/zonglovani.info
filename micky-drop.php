<?php
require('init.php');

$smarty->assign("titulek","Míčky na zemi");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-drop.tpl');
$smarty->display('paticka.tpl');

?>
