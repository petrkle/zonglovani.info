<?php
require('../init.php');

$smarty->assign('titulek','Jak se dostat do Ulity');

$smarty->display('hlavicka.tpl');
$smarty->display('ulita.cesta.tpl');
$smarty->display('paticka.tpl');

?>
