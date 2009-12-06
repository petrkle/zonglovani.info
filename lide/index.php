<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
$smarty->assign('dovednosti',$dovednosti);

$smarty->assign('titulek','Seznam žonglérů');
$smarty->assign('uzivatele',get_loginy());
$smarty->display('hlavicka.tpl');
$smarty->display('lide.tpl');
$smarty->display('paticka.tpl');

?>
