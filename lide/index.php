<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Uživatelské účty");
$smarty->assign("uzivatele",get_loginy());
$smarty->assign("rsslink",'http://'.$_SERVER["SERVER_NAME"].LIDE_URL.'uzivatele.rss');

	$smarty->display('hlavicka.tpl');
	$smarty->display('lide.tpl');
	$smarty->display('paticka.tpl');
?>
