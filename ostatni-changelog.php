<?php
require('init.php');
require('func.php');

$smarty->assign("titulek","Zm�ny v �ongl�rov� slabik��i");
$smarty->assign("rsslink",'http://'.$_SERVER["SERVER_NAME"].'/ostatni/changelog.rss');

$smarty->display('hlavicka.tpl');

$smarty->assign("zmeny",get_changelog());
$smarty->display('ostatni-changelog.tpl');

$smarty->display('paticka.tpl');
?>
