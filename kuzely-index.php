<?php

require('init.php');

$smarty->assign("titulek","�onglov�n� s ku�ely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely.tpl');
$smarty->display('paticka.tpl');

?>
