<?php

require('init.php');

$smarty->assign("titulek","Přístupnost");

$smarty->display('hlavicka.tpl');
$smarty->display('pristupnost.tpl');
$smarty->display('paticka.tpl');

?>
