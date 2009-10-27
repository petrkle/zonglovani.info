<?php
require('init.php');

$smarty->assign("titulek","Žonglování s vajíčky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vajicka.tpl');
$smarty->display('paticka.tpl');

?>
