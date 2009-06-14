<?php
require('init.php');

$smarty->assign("titulek","Balancování ku¾elu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');

?>
