<?php
require('init.php');

$smarty->assign("titulek","Ohnivé kužely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-ohen.tpl');
$smarty->display('paticka.tpl');

?>
