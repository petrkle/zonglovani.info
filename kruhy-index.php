<?php

require('init.php');

$smarty->assign("titulek","�onglov�n� s kruhy");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');

?>
