<?php

require('init.php');

$smarty->assign("titulek","V�roba kruh�");

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
