<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","P�ihl�en�");

$smarty->display('hlavicka.tpl');
$smarty->display('prihlaseni.tpl');
$smarty->display('paticka.tpl');


?>
