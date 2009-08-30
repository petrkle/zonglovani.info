<?php
require('init.php');
require('func.php');

$smarty->assign("titulek","Zmìny v ¾onglérovì slabikáøi");
$smarty->assign("rsslink",'http://'.$_SERVER["SERVER_NAME"].'/ostatni/changelog.rss');

$smarty->display('hlavicka.tpl');

$smarty->assign("zmeny",get_changelog());
$smarty->display('ostatni-changelog.tpl');

$smarty->display('paticka.tpl');
?>
