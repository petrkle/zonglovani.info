<?php
require('init.php');

$smarty->assign("titulek","�onglov�n� s m��ky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');

?>
