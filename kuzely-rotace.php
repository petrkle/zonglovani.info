<?php
require('init.php');

$smarty->assign("titulek","Rotace ku�elu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-rotace.tpl');
$smarty->display('paticka.tpl');

?>
