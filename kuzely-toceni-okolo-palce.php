<?php
require('init.php');

$smarty->assign("titulek","Ot��en� ku�elky okolo palce");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-toceni-okolo-palce.tpl');
$smarty->display('paticka.tpl');

?>
