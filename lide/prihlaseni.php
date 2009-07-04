<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Pøihlá¹ení");

$smarty->display('hlavicka.tpl');
$smarty->display('prihlaseni.tpl');
$smarty->display('paticka.tpl');


?>
