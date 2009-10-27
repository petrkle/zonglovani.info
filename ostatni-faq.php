<?php
require('init.php');

$smarty->assign("titulek","Často kladené otázky");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-faq.tpl');
$smarty->display('paticka.tpl');

?>
