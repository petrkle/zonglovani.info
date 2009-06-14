<?php
require('init.php');

$smarty->assign("titulek","®onglování s vajíèky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vajicka.tpl');
$smarty->display('paticka.tpl');

?>
