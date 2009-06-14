<?php
require('init.php');

$smarty->assign("titulek","®onglérské míèky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-druhy.tpl');
$smarty->display('paticka.tpl');

?>

