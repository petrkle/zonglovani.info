<?php
require('init.php');

$smarty->assign("titulek","Balancování kuželu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');

?>
