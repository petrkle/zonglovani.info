<?php
require('init.php');

$smarty->assign("titulek","Cirkusov� discipl�ny");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-cirkusove-discipliny.tpl');
$smarty->display('paticka.tpl');

?>
