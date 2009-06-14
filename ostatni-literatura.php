<?php
require('init.php');

$smarty->assign("titulek","Literatura");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-literatura.tpl');
$smarty->display('paticka.tpl');

?>
