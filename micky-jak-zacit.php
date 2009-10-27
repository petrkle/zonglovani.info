<?php
require('init.php');

$smarty->assign("titulek","Jak začít žonglovat s míčky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
