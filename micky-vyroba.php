<?php
require('init.php');

$smarty->assign("titulek","Výroba míčků na žonglování");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
