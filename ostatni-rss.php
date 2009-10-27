<?php
require('init.php');

$smarty->assign("titulek","RSS kanály");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-rss.tpl');
$smarty->display('paticka.tpl');

?>
