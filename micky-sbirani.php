<?php
require('init.php');

$smarty->assign("titulek","Sb�r�n� spadl�ch m��k�");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-sbirani.tpl');
$smarty->display('paticka.tpl');

?>
