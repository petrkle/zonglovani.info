<?php

require('init.php');

$smarty->assign("titulek","Pøístupnost");

$smarty->display('hlavicka.tpl');
$smarty->display('pristupnost.tpl');
$smarty->display('paticka.tpl');

?>
