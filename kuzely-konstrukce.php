<?php
require('init.php');

$smarty->assign("titulek","Konstrukce kuželu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-konstrukce.tpl');
$smarty->display('paticka.tpl');

?>
