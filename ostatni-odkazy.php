<?php
require('init.php');

$smarty->assign("titulek","Žonglování na síti");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odkazy.tpl');
$smarty->display('paticka.tpl');

?>
