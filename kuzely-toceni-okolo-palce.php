<?php
require('init.php');

$smarty->assign("titulek","Otáčení kuželky okolo palce");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-toceni-okolo-palce.tpl');
$smarty->display('paticka.tpl');

?>
