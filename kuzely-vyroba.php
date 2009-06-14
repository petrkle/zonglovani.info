<?php
require('init.php');

$smarty->assign("titulek","Výroba ku¾elù");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
