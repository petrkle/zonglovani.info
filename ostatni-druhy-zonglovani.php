<?php
require('init.php');

$smarty->assign("titulek","Druhy žonglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-druhy-zonglovani.tpl');
$smarty->display('paticka.tpl');

?>
