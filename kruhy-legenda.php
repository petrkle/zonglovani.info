<?php

require('init.php');

$smarty->assign("titulek","Vysvětlivky k obrázkům - kruhy");
$smarty->assign("nadpis","Vysvětlivky k obrázkům");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-legenda.tpl');
$smarty->display('paticka.tpl');

?>
