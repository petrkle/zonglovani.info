<?php
require('init.php');

$smarty->assign("titulek","Výroba kuželů");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
