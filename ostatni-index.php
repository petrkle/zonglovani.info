<?php
require('init.php');

$smarty->assign("titulek","Dal�� informace o �onglov�n�");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni.tpl');
$smarty->display('paticka.tpl');

?>
