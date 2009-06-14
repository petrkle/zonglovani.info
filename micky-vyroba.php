<?php
require('init.php');

$smarty->assign("titulek","Výroba míèkù na ¾onglování");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
