<?php
require('init.php');

$smarty->assign("titulek","�onglov�n� s vaj��ky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vajicka.tpl');
$smarty->display('paticka.tpl');

?>
