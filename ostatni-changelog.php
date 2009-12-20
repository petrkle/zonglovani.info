<?php
require('init.php');
require('func.php');

#nastavení linku
#svn propset --revprop -r 206 svn:link "/horoskop/"

$smarty->assign("titulek","Změny v žonglérově slabikáři");
$smarty->assign("rsslink",'http://'.$_SERVER["SERVER_NAME"].'/ostatni/changelog.rss');

$smarty->display('hlavicka.tpl');

$smarty->assign('zmeny',get_changelog());
$smarty->display('ostatni-changelog.tpl');

$smarty->display('paticka.tpl');
?>
