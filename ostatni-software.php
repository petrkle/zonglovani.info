<?php
require('init.php');

$smarty->assign("titulek","Simulátory žonglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-software.tpl');
$smarty->display('paticka.tpl');

?>
