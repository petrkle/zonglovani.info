<?php
require('init.php');

$smarty->assign("titulek","Jak na �onglov�n� s p�ti m��ky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-rady-5.tpl');
$smarty->display('paticka.tpl');

?>
