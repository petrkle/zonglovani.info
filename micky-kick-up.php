<?php
require('init.php');

$smarty->assign("titulek","Zvednut� m��ku nohou");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-kick-up.tpl');
$smarty->display('paticka.tpl');

?>
