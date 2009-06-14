<?php
header ("HTTP/1.0 404 Not Found");
require_once('init.php');

$smarty->assign("titulek","Stránka nebyla nalezena");
$smarty->display('hlavicka.tpl');
$smarty->display('404.tpl');
$smarty->display('paticka.tpl');
?>
