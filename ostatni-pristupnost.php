<?php

require('init.php');

$smarty->assign("titulek","P��stupnost");

$smarty->display('hlavicka.tpl');
$smarty->display('pristupnost.tpl');
$smarty->display('paticka.tpl');

?>
