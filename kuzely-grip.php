<?php
require('init.php');

$smarty->assign("titulek","Dva ku�ely v jedn� ruce");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-grip.tpl');
$smarty->display('paticka.tpl');

?>
