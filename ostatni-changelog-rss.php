<?php
require('init.php');
require('func.php');

$smarty->assign("zmeny",get_changelog());
header('Content-Type: application/rss+xml');
$smarty->display('ostatni-changelog-rss.tpl');

?>