<?php
require('init.php');

$smarty->assign("titulek","V�roba ku�el�");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
