<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Nastavení");

$smarty->display('hlavicka.tpl');
$smarty->display('nastaveni.tpl');
$smarty->display('paticka.tpl');


?>
