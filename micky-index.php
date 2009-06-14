<?php
require('init.php');

$smarty->assign("titulek","®onglování s míèky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');

?>
