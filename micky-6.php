<?php

require('init.php');

$smarty->assign("titulek","�onglov�n� se �esti m��ky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-6.tpl');
$smarty->display('paticka.tpl');

?>
