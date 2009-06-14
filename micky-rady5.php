<?php
require('init.php');

$smarty->assign("titulek","Jak na ¾onglování s pìti míèky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-rady-5.tpl');
$smarty->display('paticka.tpl');

?>
