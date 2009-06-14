<?php

require('init.php');

$smarty->assign("titulek","®onglování se ¹esti míèky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-6.tpl');
$smarty->display('paticka.tpl');

?>
