<?php
require('init.php');

$smarty->assign("titulek","RSS kan�ly");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-rss.tpl');
$smarty->display('paticka.tpl');

?>
