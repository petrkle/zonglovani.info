<?php
require('init.php');
require('func.php');

$smarty->assign("zmeny",get_changelog());
$smarty->display('ostatni-changelog-rss.tpl');

?>
