<?php
require('init.php');

$smarty->assign("titulek","Balancov�n� ku�elu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');

?>
