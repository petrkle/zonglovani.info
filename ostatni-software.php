<?php
require('init.php');

$smarty->assign("titulek","Simulátory ¾onglování");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-software.tpl');
$smarty->display('paticka.tpl');

?>
