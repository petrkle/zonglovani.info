<?php
require('init.php');

$smarty->assign("titulek","Zvednutí kuželu nohou");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-kickup.tpl');
$smarty->display('paticka.tpl');

?>
