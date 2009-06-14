<?php
require('init.php');

$smarty->assign("titulek","Otáèení ku¾elky okolo palce");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-toceni-okolo-palce.tpl');
$smarty->display('paticka.tpl');

?>
