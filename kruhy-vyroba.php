<?php

require('init.php');

$smarty->assign("titulek","Výroba kruhů");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
