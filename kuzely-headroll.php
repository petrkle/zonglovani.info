<?php
require('init.php');

$smarty->assign("titulek","P�ekulen� ku�elky p�es hlavu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-headroll.tpl');
$smarty->display('paticka.tpl');

?>
