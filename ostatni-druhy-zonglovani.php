<?php
require('init.php');

$smarty->assign("titulek","Druhy �onglov�n�");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-druhy-zonglovani.tpl');
$smarty->display('paticka.tpl');

?>
