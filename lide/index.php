<?php
require('../init.php');

$smarty->assign("titulek","U¾ivatelské úèty");

	$smarty->display('hlavicka.tpl');
	$smarty->display('lide.tpl');
	$smarty->display('paticka.tpl');
?>
