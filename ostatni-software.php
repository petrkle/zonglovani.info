<?php
require('init.php');

$smarty->assign("titulek","Simulátory ľonglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-software.tpl');
$smarty->display('paticka.tpl');

?>
