<?php
require('init.php');

$smarty->assign("titulek","�ongl�rsk� m��ky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-druhy.tpl');
$smarty->display('paticka.tpl');

?>

