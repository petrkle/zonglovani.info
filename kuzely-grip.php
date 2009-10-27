<?php
require('init.php');

$smarty->assign("titulek","Dva kužely v jedné ruce");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-grip.tpl');
$smarty->display('paticka.tpl');

?>
