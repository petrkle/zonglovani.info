<?php
require('init.php');

$smarty->assign("titulek","Anglicko-�esk� �ongl�rsk� slovn��ek");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-aczslovnicek.tpl');
$smarty->display('paticka.tpl');

?>
