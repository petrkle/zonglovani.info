<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Vzkaz pro uživatele");

$smarty->display('hlavicka.tpl');
$smarty->display('vzkaz.tpl');
$smarty->display('paticka.tpl');


?>
