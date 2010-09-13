<?php
require('../init.php');
require('../func.php');

$smarty->assign('zmeny',get_changelog(true));
header('Content-Type: application/rss+xml');
if(isset($_GET['v'])){
	$smarty->display('ostatni-changelog-rss2.tpl');
}else{
	$smarty->display('ostatni-changelog-rss.tpl');
}

?>
