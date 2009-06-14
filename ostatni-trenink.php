<?php

require('init.php');

$smarty->assign("titulek","Trénink");

$smarty->display('hlavicka.tpl');
$smarty->display('trenink.tpl');
$smarty->display('paticka.tpl');

?>
