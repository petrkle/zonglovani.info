<?php
require('../init.php');

$smarty->assign("titulek","®onglérùv slabikáø");
$smarty->assign("nadpis","none");
$smarty->assign("notitle",true);

$smarty->display('hlavicka-kal.tpl');
$smarty->display('kalendar-add.tpl');
$smarty->display('paticka-kal.tpl');

?>
