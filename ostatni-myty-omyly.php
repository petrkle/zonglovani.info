<?php
require('init.php');

$smarty->assign("titulek","Mýty a omyly");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-myty-omyly.tpl');
$smarty->display('paticka.tpl');

?>
