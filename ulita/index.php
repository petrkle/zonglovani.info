<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","�onglov�n� v Ulit�");

	$smarty->display('hlavicka.tpl');
	$smarty->display('ulita.tpl');
	$smarty->display('paticka.tpl');
?>
