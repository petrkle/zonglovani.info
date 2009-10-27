<?php
require('init.php');

$smarty->assign("titulek","Žonglování s kužely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
