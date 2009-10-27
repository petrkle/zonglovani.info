<?php
require_once('init.php');

$smarty->assign("titulek","Přístup zakázán");

$smarty->display('hlavicka.tpl');
$smarty->display('403.tpl');
$smarty->display('paticka.tpl');

?>
