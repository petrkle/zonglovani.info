<?php
require('init.php');

$smarty->assign("titulek","Ohniv� ku�ely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-ohen.tpl');
$smarty->display('paticka.tpl');

?>
