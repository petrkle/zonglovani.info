<?php
require('../init.php');

$smarty->assign("titulek","�ongl�r�v slabik��");
$smarty->assign("nadpis","none");
$smarty->assign("notitle",true);

$smarty->display('hlavicka-kal.tpl');
$smarty->display('kalendar-add.tpl');
$smarty->display('paticka-kal.tpl');

?>
