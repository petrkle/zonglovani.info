<?php
require('init.php');

$smarty->assign('titulek','Jak na žonglování s pěti míčky');
$smarty->assign('feedback',true);

$smarty->display('hlavicka.tpl');
$smarty->display('micky-rady-5.tpl');
$smarty->display('paticka.tpl');

?>
