<?php
require('../init.php');

$smarty->assign("titulek","U�ivatelsk� ��ty");

	$smarty->display('hlavicka.tpl');
	$smarty->display('lide.tpl');
	$smarty->display('paticka.tpl');
?>
