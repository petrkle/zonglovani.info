<?php
require('init.php');

$smarty->assign("titulek","Vysv�tlivky k obr�zk�m - ku�ely");
$smarty->assign("nadpis","Vysv�tlivky k obr�zk�m");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-legenda.tpl');
$smarty->display('paticka.tpl');

?>
