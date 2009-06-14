<?php
require('init.php');

$smarty->assign("titulek","®onglérské náèiní");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-nacini.tpl');
$smarty->display('paticka.tpl');

?>
