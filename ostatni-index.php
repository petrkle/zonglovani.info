<?php
require('init.php');

$smarty->assign("titulek","Dal¹í informace o ¾onglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni.tpl');
$smarty->display('paticka.tpl');

?>
