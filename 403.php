<?php
require_once('init.php');

$smarty->assign("titulek","P��stup zak�z�n");

$smarty->display('hlavicka.tpl');
$smarty->display('403.tpl');
$smarty->display('paticka.tpl');

?>
