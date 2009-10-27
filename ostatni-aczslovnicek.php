<?php
require('init.php');

$smarty->assign("titulek","Anglicko-český žonglérský slovníček");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-aczslovnicek.tpl');
$smarty->display('paticka.tpl');

?>
