<?php
require('init.php');

$smarty->assign("titulek","�onglov�n� - z�kladn� pojmy");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-zakladni-pojmy.tpl');
$smarty->display('paticka.tpl');

?>
