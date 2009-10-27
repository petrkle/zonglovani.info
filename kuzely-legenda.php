<?php
require('init.php');

$smarty->assign("titulek","Vysvětlivky k obrázkům - kužely");
$smarty->assign("nadpis","Vysvětlivky k obrázkům");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-legenda.tpl');
$smarty->display('paticka.tpl');

?>
