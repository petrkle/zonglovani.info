<?php

require('init.php');

$smarty->assign("titulek","Podpořte žonglérův slabikář");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-podporte-zongleruv-slabikar.tpl');
$smarty->display('paticka.tpl');

?>
