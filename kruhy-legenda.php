<?php

require('init.php');

$smarty->assign("titulek","Vysv�tlivky k obr�zk�m - kruhy");
$smarty->assign("nadpis","Vysv�tlivky k obr�zk�m");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-legenda.tpl');
$smarty->display('paticka.tpl');

?>
