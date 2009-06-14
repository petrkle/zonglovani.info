<?php
require('init.php');

$smarty->assign("titulek","Passing s míèky - mills' mess");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-passing-mm.tpl');
$smarty->display('paticka.tpl');

?>
