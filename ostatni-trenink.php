<?php

require('init.php');

$smarty->assign("titulek","Tr�nink");

$smarty->display('hlavicka.tpl');
$smarty->display('trenink.tpl');
$smarty->display('paticka.tpl');

?>
