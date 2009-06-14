<?php
require('init.php');

$smarty->assign("titulek","Proè a jak vznikl ¾ognlérùv slabikáø");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-proc-a-jak.tpl');
$smarty->display('paticka.tpl');

?>
