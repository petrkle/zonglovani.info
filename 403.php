<?php
require_once('init.php');

$smarty->assign("titulek","Pøístup zakázán");

$smarty->display('hlavicka.tpl');
$smarty->display('403.tpl');
$smarty->display('paticka.tpl');

?>
