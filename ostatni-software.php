<?php
require('init.php');

$smarty->assign("titulek","Simul�tory �onglov�n�");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-software.tpl');
$smarty->display('paticka.tpl');

?>
