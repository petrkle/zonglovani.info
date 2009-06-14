<?php
require('init.php');

$smarty->assign("titulek","Ohnivé ku¾ely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-ohen.tpl');
$smarty->display('paticka.tpl');

?>
