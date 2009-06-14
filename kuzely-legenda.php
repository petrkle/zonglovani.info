<?php
require('init.php');

$smarty->assign("titulek","Vysvìtlivky k obrázkùm - ku¾ely");
$smarty->assign("nadpis","Vysvìtlivky k obrázkùm");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-legenda.tpl');
$smarty->display('paticka.tpl');

?>
