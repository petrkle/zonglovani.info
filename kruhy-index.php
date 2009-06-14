<?php

require('init.php');

$smarty->assign("titulek","®onglování s kruhy");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');

?>
