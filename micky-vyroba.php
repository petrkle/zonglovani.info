<?php
require('init.php');

$smarty->assign("titulek","V�roba m��k� na �onglov�n�");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
