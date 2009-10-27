<?php
require('init.php');

$smarty->assign("titulek","Proč a jak vznikl žognlérův slabikář");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-proc-a-jak.tpl');
$smarty->display('paticka.tpl');

?>
