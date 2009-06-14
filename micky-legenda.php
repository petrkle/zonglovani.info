<?php
require('init.php');

$smarty->assign("titulek","Vysvìtlivky k obrázkùm - míèky");
$smarty->assign("nadpis","Vysvìtlivky k obrázkùm");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-legenda.tpl');
$smarty->display('paticka.tpl');

?>
