<?php

require('init.php');

$smarty->assign("titulek","Kontakt");

$smarty->display('hlavicka.tpl');
$smarty->display('kontakt.tpl');
$smarty->display('paticka.tpl');

?>
