<?php
require('init.php');

$smarty->assign("titulek","Vysv�tlivky k obr�zk�m - m��ky");
$smarty->assign("nadpis","Vysv�tlivky k obr�zk�m");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-legenda.tpl');
$smarty->display('paticka.tpl');

?>
