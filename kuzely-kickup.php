<?php
require('init.php');

$smarty->assign("titulek","Zvednut� ku�elu nohou");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-kickup.tpl');
$smarty->display('paticka.tpl');

?>
