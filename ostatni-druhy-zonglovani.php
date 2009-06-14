<?php
require('init.php');

$smarty->assign("titulek","Druhy ¾onglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-druhy-zonglovani.tpl');
$smarty->display('paticka.tpl');

?>
