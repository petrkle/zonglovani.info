<?php
require('init.php');

$smarty->assign("titulek","M��ky na zemi");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-drop.tpl');
$smarty->display('paticka.tpl');

?>
