<?php

require('init.php');

$smarty->assign("titulek","Žonglování s kruhy");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');

?>
