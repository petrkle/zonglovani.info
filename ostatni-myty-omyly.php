<?php
require('init.php');

$smarty->assign("titulek","M�ty a omyly");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-myty-omyly.tpl');
$smarty->display('paticka.tpl');

?>
