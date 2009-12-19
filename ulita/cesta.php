<?php
require('../init.php');

$smarty->assign('titulek','Jak se dostat do Ulity');
$smarty->assign('icbm','50.094605, 14.481742');

$smarty->display('hlavicka.tpl');
$smarty->display('ulita.cesta.tpl');
$smarty->display('paticka.tpl');

?>
