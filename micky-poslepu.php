<?php
require('init.php');

$smarty->assign("titulek","�onglov�n� poslepu");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-poslepu.tpl');
$smarty->display('paticka.tpl');

?>
