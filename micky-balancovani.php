<?php
require('init.php');

$smarty->assign("titulek","Balancov�n� m��ku");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-balancovani.tpl');
$smarty->display('paticka.tpl');

?>
