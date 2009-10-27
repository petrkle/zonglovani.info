<?php
require('init.php');

$smarty->assign("titulek","Žonglování - základní pojmy");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-zakladni-pojmy.tpl');
$smarty->display('paticka.tpl');

?>
