<?php
require('init.php');

$smarty->assign("titulek","�asto kladen� ot�zky");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-faq.tpl');
$smarty->display('paticka.tpl');

?>
