<?php
require('init.php');

$smarty->assign("titulek","Siteswap");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-siteswap.tpl');
$smarty->display('paticka.tpl');

?>
