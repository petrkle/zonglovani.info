<?php
require('init.php');

$smarty->assign("titulek","Zvednutí ku¾elu nohou");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-kickup.tpl');
$smarty->display('paticka.tpl');

?>
