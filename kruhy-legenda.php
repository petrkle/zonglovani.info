<?php

require('init.php');

$smarty->assign("titulek","Vysvìtlivky k obrázkùm - kruhy");
$smarty->assign("nadpis","Vysvìtlivky k obrázkùm");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-legenda.tpl');
$smarty->display('paticka.tpl');

?>
