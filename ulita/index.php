<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","®onglování v Ulitì");

	$smarty->display('hlavicka.tpl');
	$smarty->display('ulita.tpl');
	$smarty->display('paticka.tpl');
?>
