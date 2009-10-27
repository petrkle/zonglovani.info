<?php
require('init.php');

$smarty->assign("titulek","Další informace o žonglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni.tpl');
$smarty->display('paticka.tpl');

?>
