<?php

require('init.php');

$smarty->assign("titulek","Jak zaèít ¾onglovat s kruhy");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
