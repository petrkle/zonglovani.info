<?php
require('init.php');

$smarty->assign("titulek","Zvednutí míčku nohou");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-kick-up.tpl');
$smarty->display('paticka.tpl');

?>
