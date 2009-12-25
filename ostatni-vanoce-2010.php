<?php
require('init.php');
$smarty->assign('titulek','Veselé vánoce');
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce.tpl');
$smarty->display('paticka.tpl');
?>
