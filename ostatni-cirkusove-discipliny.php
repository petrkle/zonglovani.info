<?php
require('init.php');

$smarty->assign("titulek","Cirkusové disciplíny");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-cirkusove-discipliny.tpl');
$smarty->display('paticka.tpl');

?>
