<?php
require('init.php');

$smarty->assign("titulek","Jak za��t �onglovat s m��ky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
