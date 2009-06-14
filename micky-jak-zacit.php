<?php
require('init.php');

$smarty->assign("titulek","Jak zaèít ¾onglovat s míèky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
