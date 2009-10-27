<?php

require('init.php');

$smarty->assign("titulek","Žonglování s kužely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely.tpl');
$smarty->display('paticka.tpl');

?>
